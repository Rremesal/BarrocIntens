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
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('description', 255);
            $table->string('image_path', 255);
            $table->decimal('price');
            $table->integer('amount');
            $table->unsignedBigInteger('product_categoty_id')->nullable();
            $table->timestamps();

            $table->foreign('product_categoty_id')->references('id')->on('product_categories')->onDelete('set null');
        });
    }
   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
