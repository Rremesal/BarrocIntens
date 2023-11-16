<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('phone', 255);
            $table->string('street', 255);
            $table->string('house_number', 255);
            $table->string('city', 255);
            $table->string('country_code', 3);
            $table->dateTime('bkr_checked_at');
            $table->unsignedBigInteger('contact_id');
            $table->foreign('contact_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
