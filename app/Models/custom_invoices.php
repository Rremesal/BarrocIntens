<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class custom_invoices extends Model
{
    use HasFactory;

    public function company() {
        $this->belongsTo(company::class);
    }

    public function custom_invoice_products() {
        $this->hasMany(custom_invoice_products::class);
    }
}
