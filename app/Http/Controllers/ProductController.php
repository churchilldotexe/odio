<?php

namespace App\Http\Controllers;

use App\Enums\ProductCategory;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductControllerService;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $category): Response
    {
        $productCategory = ProductCategory::tryFrom($category);
        if (! $productCategory) {
            abort(404);
        }

        $products = Product::with(['productImages'])
            ->where('category', $category)
            ->get();

        return Inertia::render('Products/Index', ['products' => $products->map(function ($product) {

            $productArray = $product->toArray();

            $productArray['product_images'] = ProductControllerService::groupRelatedProducts(collect($product->productImages), 'image_type');

            return $productArray;
        })->sortByDesc('new')->values(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $category, Product $product): Response
    {

        if ($product->category !== $category) {
            abort(404);
        }

        $loadedProduct = $product->load(['galleryImages', 'productImages', 'productInclusions']);

        $transformedImage = [
            ...$loadedProduct->toArray(),
            'product_images' => ProductControllerService::groupRelatedProducts($product->productImages, 'image_type'),
            'gallery_images' => ProductControllerService::groupRelatedProducts($product->galleryImages, 'image_position'),
        ];

        return Inertia::render('Products/Show', ['product' => $transformedImage]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): void
    {
        //
    }
}
