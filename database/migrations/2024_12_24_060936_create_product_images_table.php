<?php

use App\Models\Product;
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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class);
            $table->enum('image_type', ['main', 'category']);
            $table->enum('device_type', ['mobile', 'tablet', 'desktop']);
            $table->string('url');
            $table->timestamps();
            $table->unique('product_id', 'image_type', 'device_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};

// -- Images table for product images
// CREATE TABLE product_images (
//     id INTEGER PRIMARY KEY AUTOINCREMENT,
//     product_id INTEGER NOT NULL,
//     image_type VARCHAR(20) NOT NULL,  -- 'main' or 'category'
//     device_type VARCHAR(20) NOT NULL,  -- 'mobile', 'tablet', or 'desktop'
//     image_path VARCHAR(255) NOT NULL,
//     FOREIGN KEY (product_id) REFERENCES products(id),
//     UNIQUE(product_id, image_type, device_type)
// );
//