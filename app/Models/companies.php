<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    use HasFactory;

    public function user() {
        $this->belongsTo(User::class);
    }

    public function maintenance_appointments() {
        $this->hasMany(maintenance_appointments::class);
    }

    public function custom_invoices() {
        $this->hasMany(custom_invoices::class);
    }
}
