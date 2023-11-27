<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_per_work_order extends Model
{
    use HasFactory;

    public function work_order() {
        return $this->belongsTo(product_per_work_order::class);
    }

    public function product() {
        return $this->belongsTo(Machine::class);
    }
}
