<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        ];
    }
}

// public function up(): void
// {
//     Schema::create('product_images', function (Blueprint $table) {
//         $table->id();
//         $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
//         $table->string('image_type')->default(ImageType::MAIN->value);
//         $table->string('device_type')->default(DeviceType::MOBILE->value);
//         $table->string('image_path');
//         $table->timestamps();
//         $table->unique('product_id', 'image_type', 'device_type');
//     });
// }
