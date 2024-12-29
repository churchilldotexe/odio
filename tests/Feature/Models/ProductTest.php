<?php

use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductInclusion;
use Database\Seeders\ProductSeeder;

describe('Product Model Database queries', function () {
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
});

describe('Product model helper createWithAllRelatedTables', function () {

    it('should also create and seed the productImages table through helper', function () {

        $this->seed(ProductSeeder::class);

        expect(Product::count())->toEqual(6);
        expect(ProductImage::count())->toEqual(36);

    });

    it('should also create and seed the galleryImages table through helper', function () {

        $this->seed(ProductSeeder::class);

        expect(Product::count())->toEqual(6);
        expect(GalleryImage::count())->toEqual(54);

    });

    it('should also create and seed the ProductInclusion table through helper', function () {

        $this->seed(ProductSeeder::class);

        expect(Product::count())->toEqual(6);
        expect(ProductInclusion::count())->toEqual(28);

    });
});
