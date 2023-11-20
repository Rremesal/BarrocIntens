<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class custom_invoice_products extends Model
{
    use HasFactory;

    public function product() {
        $this->belongsTo(Machine::class);
    }

    public function custom_invoice() {
        $this->belongsTo(custom_invoices::class);
    }
}
