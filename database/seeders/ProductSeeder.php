<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Services\JsonDataService;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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
            Product::create([
                'name' => $product['name'],
                'category' => $product['category'],
                'new' => $product['new'],
                'price' => $product['price'],
                'description' => $product['description'],
                'features' => $product['features'],
            ]);
        });
    }
}
