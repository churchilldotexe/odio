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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('category', ['earphones', 'headphones', 'speakers']);
            $table->boolean('new');
            $table->decimal('price');
            $table->text('description');
            $table->text('features');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

// CREATE TABLE products (
//     id INTEGER PRIMARY KEY,
//     name VARCHAR(100) NOT NULL,
//     category VARCHAR(50) NOT NULL,
//     new BOOLEAN NOT NULL,
//     price DECIMAL(10,2) NOT NULL,
//     description TEXT NOT NULL,
//     features TEXT NOT NULL
// );
//
