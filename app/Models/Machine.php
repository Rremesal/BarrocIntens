<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product_category() {
        return $this->belongsTo(Product_categories::class, 'product_category_id');
    }

    public function custom_invoice_product() {
        return $this->belongsToMany(custom_invoice_products::class);
    }

    public function stockchange() {
        return $this->hasMany(stockchange::class);
    }
}
