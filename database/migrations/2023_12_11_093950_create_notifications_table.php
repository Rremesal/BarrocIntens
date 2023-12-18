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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string("subject")->nullable(false);
            $table->text("content")->nullable(false);
            $table->unsignedBigInteger("amount")->nullable(false);
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("for_role_id");
            $table->foreign("product_id")->references("id")->on("products");
            $table->foreign("for_role_id")->references("id")->on("roles");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
