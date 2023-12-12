<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Notification;
use App\Models\Stockchange;
use Illuminate\Http\Request;

class StockchangeController extends Controller
{
    private $rules = [
        "amount" => ["required"],
        "table" => [],
    ];

    public function update($item_id)
    {
        $data = request()->validate($this->rules);
        $tableName = $data["table"];
        unset($data["table"]);

        switch ($tableName) {
            case "products":

                $producten = Machine::all();
                $viewData = [];
                foreach ($producten as $product) {
                    $latestStockChange = Stockchange::where("machine_id", $product->id)->latest()->first()->amount;
                    // here you can format the viewData of specific array entries
                    if (strlen($product->description) > 5) {
                        $product->description = substr($product->description, 0, 30) . "...";
                    }
                    // setting a temporary value for the foreign key and then deleting the foreign key field
                    $product->category = $product->product_category->name;
                    unset($product->product_category_id);
                    $product->amount = $product->stockchange()->sum('amount');
                    $product->new_stock = $latestStockChange;
                    foreach ($product->stockchange as $stockchange) {
                        $product->foreign_key = $stockchange->id;
                    }
                    // add formatted viewData to array
                    array_push($viewData, $product);
                }

                //links per row
                $link_array = [
                    ['route' => "product.destroy", 'icon' => "fa-solid fa-trash"],
                    ['route' => "product.edit", 'icon' => "fa-solid fa-pen-to-square"],
                ];

                $table = "products";

                if ($data["amount"] > 5000) {
                    // put the role id for which the notification is meant here
                    $data["for_role_id"] = 1;
                    // set the default subject for stock related notifications
                    $data["subject"] = "Voorraad";
                    $data["content"] = "Aanvraag nieuwe voorrraad van meer dan 5000 producten";
                    $data["product_id"] = $item_id;

                    // set the isApproved to 0 in stockchange table
                    $data["isApproved"] = 0;
                    Notification::create($data);
                }


                $data["machine_id"] = $item_id;
                Stockchange::create($data);


                $producten = Machine::all();
                $data = [];
                foreach ($producten as $product) {
                    $latestStockChange = Stockchange::where("machine_id", $product->id)->where('isApproved', '=', 1)->latest()->first()->amount;
                    // here you can format the data of specific array entries
                    if (strlen($product->description) > 5) {
                        $product->description = substr($product->description, 0, 30) . "...";
                    }
                    // setting a temporary value for the foreign key and then deleting the foreign key field
                    $product->category = $product->product_category->name;
                    unset($product->product_category_id);
                    $product->amount = $product->stockchange()->where('isApproved', '=', 1)->sum('amount');
                    $product->new_stock = $latestStockChange;
                    foreach ($product->stockchange as $stockchange) {
                        $product->foreign_key = $stockchange->id;
                    }
                    // add formatted data to array
                    array_push($data, $product);
                }

                //links per row
                $link_array = [
                    ['route' => "product.destroy", 'icon' => "fa-solid fa-trash"],
                    ['route' => "product.edit", 'icon' => "fa-solid fa-pen-to-square"],
                ];

                $table = "products";

                return view('producten.index', ['producten' => $data, 'linkjes' => $link_array, 'table' => $table]);
        }
    }
}
