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
        Schema::create('product_inclusions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->string('item_name');
            $table->integer('quantity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_inclusions');
    }
};

// -- Included items table
// CREATE TABLE included_items (
//     id INTEGER PRIMARY KEY AUTOINCREMENT,
//     product_id INTEGER NOT NULL,
//     item VARCHAR(100) NOT NULL,
//     quantity INTEGER NOT NULL,
//     FOREIGN KEY (product_id) REFERENCES products(id)
// );
//
// -- Example indexes for better query performance
// CREATE INDEX idx_products_category ON products(category);
// CREATE INDEX idx_products_new ON products(new);
// CREATE INDEX idx_products_price ON products(price);
