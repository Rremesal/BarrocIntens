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
        Schema::create('maintencance_appointemts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('description',255);
            $table->datetime('start_tijd');
            $table->datetime('eind_tijd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintencance_appointemts');
    }
};
