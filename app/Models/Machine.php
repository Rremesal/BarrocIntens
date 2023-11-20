<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    public function product_category() {
        $this->hasOne(Product_categories::class);
    }

    public function custom_invoice_product() {
        $this->belongsToMany(custom_invoice_products::class);
    }
}
