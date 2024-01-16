<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_categories;
use App\Models\Stockchange;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    private $rules = [
        "name" => ["required", "min:5"],
        "description" => ["required", "min:10"],
        "file" => ["required"],
        "price" => ["required", "decimal:2"],
        "amount" => ["required"],
        "product_category_id" => ["required"],

    ];

    public function index() {
        $stock = request()->input("stock");
        $search = request()->input("search");

        if($stock == "0") {
            $producten = Product::whereNotIn('id', function ($query) {
                $query->select('product_id')->from('stockchanges');
            })->get();
        } else if($stock == "1") {
            $producten = Product::whereIn('id', function ($query) {
                $query->select('product_id')->from('stockchanges');
            })->get();
        } else {
            $producten = Product::all();
        }

        if($search != null) {
            $producten = Product::where("name", "LIKE", "%".$search."%")->get();
        }

        foreach($producten as $product) {
            unset($product->created_at);
            unset($product->updated_at);
            $latestStock = Stockchange::where("product_id", "=", $product->id)->where("isApproved", 1)->latest()->first();
            $amount = Stockchange::where("product_id", "=", $product->id)->where("isApproved", 1)->sum("amount");

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

        $table = "products";

        return view('producten.index', ['producten' => $producten, 'table' => $table]);
    }

    public function create() {
        $productcategories = Product_categories::all();
        return view('producten.create', ['categorieen' => $productcategories]);
    }

    public function store() {
        $data = request()->validate($this->rules);
        $temp_stock = $data["amount"];

        $product = Product::create($data);

        if($temp_stock > 5000) {
            Stockchange::create(['product_id' => $product->id, 'amount' => $temp_stock, 'isApproved' => 0]);
            return redirect()->route('product.index');
        }

        Stockchange::create(['product_id' => $product->id, 'amount' => $temp_stock]);

        return redirect()->route('product.index');
    }

    public function edit(Product $product) {
        $product->amount = Stockchange::where("product_id", $product->id)->sum("amount");
        $productcategories = Product_categories::all();
        return view('producten.create', ['product' => $product, 'categorieen' => $productcategories]);
    }

    public function update(Product $product) {
        $data = request()->validate($this->rules);
        $amount = $product->stockchange()->sum("amount");
        $amountToBeInserted = $data["amount"] - $amount;

        $stockchange = [
            "product_id" => $product->id,
            "amount" => $amountToBeInserted,
        ];

        if ($amountToBeInserted > 5000) {
            $stockchange["isApproved"] = 0;
            Stockchange::create($stockchange);
            return redirect()->route('product.index');
        }
        Stockchange::create($stockchange);
        $product->update($data);
        return redirect()->route('product.index');
    }

    public function destroy(Product $product) {
        $product->delete();

        return redirect()->route('product.index');
    }
}

