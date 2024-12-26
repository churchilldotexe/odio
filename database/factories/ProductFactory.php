<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'category' => fake()->randomElement(['earphones', 'headphones', 'speakers']),
            'new' => fake()->boolean,
            'price' => fake()->randomFloat(2),
            'description' => fake()->text,
            'features' => fake()->text,
        ];
    }
}

// Schema::create('products', function (Blueprint $table) {
//     $table->id();
//     $table->string('name');
//     $table->enum('category', ['earphones', 'headphones', 'speakers']);
//     $table->boolean('new');
//     $table->decimal('price');
//     $table->text('description');
//     $table->text('features');
//     $table->timestamps();
// });
