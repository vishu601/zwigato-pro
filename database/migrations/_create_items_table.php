<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->string('emoji')->default('🍔'); // UI ko tasty banane ke liye emoji system
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
