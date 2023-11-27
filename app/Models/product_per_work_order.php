<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_per_work_order extends Model
{
    use HasFactory;

    public function work_order() {
        $this->belongsTo(product_per_work_order::class);
    }

    public function product() {
        $this->belongsTo(Machine::class);
    }
}
