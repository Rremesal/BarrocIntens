<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function maintenance_appointments() {
        return $this->hasMany(maintenance_appointments::class);
    }

    public function custom_invoices() {
        return $this->hasMany(custom_invoices::class);
    }
}
