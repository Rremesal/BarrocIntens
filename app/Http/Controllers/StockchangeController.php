<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Notification;
use App\Models\Stockchange;
use Illuminate\Http\Request;

class StockchangeController extends Controller
{
    public function index()
    {
        $data = request()->all();


        if (array_key_exists("product", $data) && $data["product"] != 0) {
            $stockchanges = Stockchange::where("product_id", $data["product"])->where("isApproved", "=", 0)->get();
        } else {
            $stockchanges = Stockchange::where("isApproved", "=", 0)->get();
        }

        foreach ($stockchanges as $stockchange) {
            unset($stockchange->created_at);
            unset($stockchange->updated_at);
            $stockchange->product_id = $stockchange->product->name;
        }

        $products = Product::all();

        return view("stockchanges.index", ['stockchanges' => $stockchanges, 'products' => $products]);
    }

    public function update(Stockchange $stockchange)
    {
        $stockchange->isApproved = 1;
        $stockchange->save();

        $producten = Product::all();
        foreach ($producten as $product) {
            unset($product->created_at);
            unset($product->updated_at);
            $latestStock = Stockchange::where("product_id", "=", $product->id)->latest()->first();
            $amount = Stockchange::where("product_id", "=", $product->id)->sum("amount");

            $product->product_category_id = $product->product_category->name;

            $product->file = substr_replace($product->file, "...", 40);
            $product->description = substr_replace($product->description, "...", 50);
            $product->amount = $amount;
            if ($latestStock) {
                $product->new_stock = $latestStock->amount;
            } else {
                $product->new_stock = "N.V.T";
            }
        }
        return redirect()->route("stockchange.index");
        // return view('producten.index', ['producten' => $producten]);
    }

    public function destroy(Stockchange $stockchange)
    {
        $stockchange->delete();


        $data = request()->all();


        if (array_key_exists("product", $data) && $data["product"] != 0) {
            $stockchanges = Stockchange::where("product_id", $data["product"])->where("isApproved", "=", 0)->get();
        } else {
            $stockchanges = Stockchange::where("isApproved", "=", 0)->get();
        }

        $products = Product::all();

        $table = "stockchanges";

        $data = [];
        foreach ($stockchanges as $stockchange) {
            $stockchange["Nieuw toe te voegen aantal"] = $stockchange->amount;
            unset($stockchange->amount);
            array_push($data, $stockchange);
        }

        $link_array = [
            ['route' => "stockchange.destroy", 'icon' => "fa-solid fa-trash"],
            ['route' => "stockchange.edit", 'icon' => "fa-solid fa-pen-to-square"],
        ];

        return view("stockchanges.index", ['stockchanges' => $data, 'linkjes' => $link_array, 'table' => $table, 'products' => $products]);
    }
}
