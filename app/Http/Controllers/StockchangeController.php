<?php

namespace App\Http\Controllers;

use App\Models\Machine;
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
        // dd($tableName);
        unset($data["table"]);

        switch ($tableName) {
            case "products":
                $data["machine_id"] = $item_id;
                Stockchange::create($data);


                $producten = Machine::all();
                $data = [];
                foreach ($producten as $product) {
                    $latestStockChange = Stockchange::where("machine_id", $product->id)->latest()->first()->amount;
                    // here you can format the data of specific array entries
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
                    // add formatted data to array
                    array_push($data, $product);
                    // dump($data);
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
