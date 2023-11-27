<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Product_categories;

class MachineController extends Controller
{
    private $rules = [
        "name" => ["required", "min:5"],
        "description" => ["required", "min:10"],
        "image_path" => ["required"],
        "price" => ["required", "decimal:2"],
        "product_category_id" => ["required"],

    ];

    public function index() {

        $producten = Machine::all();
        $data = [];
        foreach($producten as $product) {
            // here you can format the data of specific array entries
            if(strlen($product->description) > 5 ) {
                $product->description = substr($product->description, 0, 30)."...";
            }
            // setting a temporary value for the foreign key and then deleting the foreign key field
            $product->product_category = $product->product_category->name;
            unset($product->product_category_id);
            // add formatted data to array
            array_push($data, $product);
        }

        //links per row
        $link_array = [
            ['route' => "product.destroy", 'icon' => "fa-solid fa-trash"],
            ['route' => "product.edit", 'icon' => "fa-solid fa-pen-to-square"],
        ];

        return view('producten.index', ['producten' => $data, 'linkjes' => $link_array]);
    }

    public function create() {
        $productcategories = Product_categories::all();
        return view('producten.create', ['categorieen' => $productcategories]);
    }

    public function store() {
        $data = request()->validate($this->rules);
        Machine::create($data);

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

