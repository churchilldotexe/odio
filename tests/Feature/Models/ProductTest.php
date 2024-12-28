<?php

use App\Models\Product;
use Database\Seeders\ProductSeeder;

it('should have products', function () {
    $products = Product::factory()->create();

    expect(Product::where('id', $products->id)->exists())->toBeTrue();

    expect($products)->toMatchArray([
        'id' => $products->id,
        'name' => $products->name,
    ]);
});

it('should populate db using seed', function () {
    $this->seed(ProductSeeder::class);

    $seededProduct = Product::count();
    expect($seededProduct)->toBeGreaterThan(5);

    $exampleProduct = Product::where('name', 'YX1 Wireless Earphones')->first();
    expect($exampleProduct)->not->toBeNull();
    expect($exampleProduct->category)->toBe('earphones');
});

it('should also create the related tables ', function () {
    $product = Product::factory()->create();

    $products = $product->createWithImages();

    expect(Product::where('id', $product->id)->exists())->toBeTrue();

});
