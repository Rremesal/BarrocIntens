<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockchange extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'machine_id'];
    protected $fillable = ["machine_id", "amount", "isApproved"];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
