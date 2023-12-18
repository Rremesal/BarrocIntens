<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockchange extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'product_id'];
    protected $fillable = ["product_id", "amount", "isApproved"];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
