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
        Schema::create('custom_invoice_products', function (Blueprint $table) {
            $table->id('custom_invoice_id');
            $table->integer('amount');
            $table->decimal('price_per_product');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('machines');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_invoice_products');
    }
};
