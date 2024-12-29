<?php

namespace Tests\Feature\Models;

use App\Enums\DeviceType;
use App\Enums\ImageType;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->product = Product::factory()->create();
    $this->validImages = [
        'mobile' => './assets/product-yx1-earphones/mobile/image-product.jpg',
        'tablet' => './assets/product-yx1-earphones/tablet/image-product.jpg',
        'desktop' => './assets/product-yx1-earphones/desktop/image-product.jpg',
    ];
});

it('create product with product images through relation', function () {
    $this->product->productImages()->create([
        'image_type' => ImageType::MAIN->value,
        'device_type' => DeviceType::MOBILE->value,
        'image_path' => './assets/product-yx1-earphones/desktop/image-product.jpg',
    ]);

    expect(Product::where('id', $this->product->id)->exists())->toBeTrue();

    expect(ProductImage::where('image_path', './assets/product-yx1-earphones/desktop/image-product.jpg')->exists())->toBeTrue();

});

it('create product and product Image by using createImageByType method', (function () {

    $productImage = new ProductImage;
    $productImage->createByType($this->product->id, ImageType::CATEGORY, $this->validImages);

    expect(ProductImage::where('image_path', $this->validImages['desktop'])->exists())->toBeTrue();

    expect(ProductImage::count())->toEqual(3);
}));

it('should fail because of unique constraint validation for repeated device type ', function () {

    $productImage = new ProductImage;
    $productImage->createByType($this->product->id, ImageType::MAIN, $this->validImages);

    $this->expectException(QueryException::class);

    // reupload the images again to trigger the unique constraints
    $productImage->createByType($this->product->id, ImageType::MAIN, $this->validImages);

});

it('fails when device type is invalid in the images array', function () {
    $images = [
        'mobiles' => './assets/product-yx1-earphones/mobile/image-product.jpg', // Invalid
        'tablets' => './assets/product-yx1-earphones/tablet/image-product.jpg', // Invalid
        'desktops' => './assets/product-yx1-earphones/desktop/image-product.jpg', // Invalid
    ];

    $product = Product::factory()->create();

    $productImage = new ProductImage;

    // Expect the exception for invalid enum value
    $this->expectException(\ValueError::class); // Enum throws ValueError for invalid cases

    $productImage->createByType($product->id, ImageType::MAIN, $images);
});

it('will throw an TypeError on invalid Image type using the helper createByType method', function () {

    $product = Product::factory()->create();

    $productImage = new ProductImage;

    // Expect the exception for invalid enum value
    $this->expectException(\TypeError::class); // Enum throws TypeError for invalid cases

    $productImage->createByType($product->id, 'foobar', $this->validImages);
});
