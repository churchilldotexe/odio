<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use App\Services\JsonDataService;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function __construct(protected JsonDataService $jsonService)
    {
        $this->jsonService;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = $this->jsonService->getJSONData('data');

        $products->each(function ($product) {
            ProductImage::create([
                ''
            ]);
        });
    }
}

// Schema::create('product_images', function (Blueprint $table) {
//     $table->id();
//     $table->foreignIdFor(Product::class);
//     $table->enum('image_type', ['main', 'category']);
//     $table->enum('device_type', ['mobile', 'tablet', 'desktop']);
//     $table->string('url');
//     $table->timestamps();
//     $table->unique('product_id', 'image_type', 'device_type');
// });
