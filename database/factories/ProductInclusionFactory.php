<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductInclusion>
 */
class ProductInclusionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'item_name' => fake()->name,
            'quantity' => fake()->randomDigit,
        ];
    }
}

// Schema::create('product_inclusions', function (Blueprint $table) {
//     $table->id();
//     $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
//     $table->string('item_name');
//     $table->string('quantity');
//     $table->timestamps();
// });
