<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Product_categories;
use App\Models\Stockchange;

class MachineController extends Controller
{
    private $rules = [
        "name" => ["required", "min:5"],
        "description" => ["required", "min:10"],
        "image_path" => ["required"],
        "price" => ["required", "decimal:2"],
        "stock" => ["required"],
        "product_category_id" => ["required"],

    ];

    public function index() {

        $producten = Machine::all();
        $data = [];
        foreach($producten as $product) {
            $latestStockChange = Stockchange::where("machine_id", $product->id)->latest()->first()->amount;
            // here you can format the data of specific array entries
            if(strlen($product->description) > 5 ) {
                $product->description = substr($product->description, 0, 30)."...";
            }
            // setting a temporary value for the foreign key and then deleting the foreign key field
            $product->product_category = $product->product_category->name;
            unset($product->product_category_id);
            $product->amount = $product->stockchange()->sum('amount');
            $product->new_stock = $latestStockChange;
            foreach($product->stockchange as $stockchange) {
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

    public function create() {
        $productcategories = Product_categories::all();
        return view('producten.create', ['categorieen' => $productcategories]);
    }

    public function store() {
        $data = request()->validate($this->rules);
        $temp_stock = $data["stock"];

        $product = Machine::create($data);

        Stockchange::create(['machine_id' => $product->id, 'amount' => $temp_stock]);

        return redirect()->route('product.index');
    }

    public function edit(Machine $product) {
        $productcategories = Product_categories::all();
        return view('producten.create', ['product' => $product, 'categorieen' => $productcategories]);
    }

    public function update(Machine $product) {
        $data = request()->validate($this->rules);
        $product->update($data);
        return redirect()->route('product.index');
    }

    public function destroy(Machine $product) {
        $product->delete();

        return redirect()->route('product.index');
    }
}

