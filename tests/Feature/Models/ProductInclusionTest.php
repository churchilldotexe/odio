<?php

namespace Tests\Feature\Models;

use App\Models\Product;
use App\Models\ProductInclusion;

beforeEach(function () {

    $this->product = Product::factory()->create();
});

it('should create Product inclusion through product model relationship', function () {

    $this->product->productInclusions()->create([
        'item_name' => fake()->name,
        'quantity' => 2,
    ]);

    expect(ProductInclusion::count())->toEqual(1);

    expect(ProductInclusion::where('id', $this->product->productInclusions()->first()->id)->exists())->toBeTrue();

    expect(ProductInclusion::first()->quantity)->toBe(2);
});

it('should throw an exception when quantity is string', function () {

    $this->expectException(\InvalidArgumentException::class);

    $this->product->productInclusions()->create([
        'item_name' => fake()->name,
        'quantity' => 'foo',
    ]);
});
