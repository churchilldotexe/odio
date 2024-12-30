<?php

namespace App\Models;

use App\Enums\ImageType;
use App\Services\ProductModelTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'new',
        'price',
        'description',
        'features',
    ];

    /**
     * @return HasMany<ProductImage,Product>
     */
    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * @return HasMany<GalleryImage,Product>
     */
    public function galleryImages(): HasMany
    {
        return $this->hasMany(GalleryImage::class);
    }

    /**
     * @return HasMany<ProductInclusion,Product>
     */
    public function productInclusions(): HasMany
    {
        return $this->hasMany(ProductInclusion::class);
    }

    /**
     * @param  array<string,string>  $mainImages
     * @param  array<string,string>  $categoryImages
     * @param  array<string,array>  $galleryImages
     * @param  array<string,string>  $productInclusions
     */
    public function createWithAllRelatedTables(array $mainImages, array $categoryImages, array $galleryImages, array $productInclusions): Product
    {

        return DB::transaction(function () use ($mainImages, $categoryImages, $galleryImages, $productInclusions) {

            try {
                $this->createProductImages($mainImages, $categoryImages);
                $this->createGalleryImages($galleryImages);
                $this->createInclusions($productInclusions);

                return $this->load('productImages', 'galleryImages', 'productInclusions');

            } catch (\Exception $e) {
                \Log::error('Failed to create product relations:'.$e->getMessage());
                throw $e;
            }
        });

    }

    protected ?ProductModelTransformer $transformer = null;

    protected function getTransformer(): ProductModelTransformer
    {
        return $this->transformer ??= new ProductModelTransformer;
    }

    /**
     * @param  array<int,mixed>  $mainImages
     * @param  array<int,mixed>  $categoryImages
     */
    protected function createProductImages(array $mainImages, array $categoryImages): void
    {

        $mainImagesResult = $this->getTransformer()->transformProductImages($mainImages, ImageType::MAIN);

        $categoryImagesResult = $this->getTransformer()->transformProductImages($categoryImages, ImageType::CATEGORY);

        self::productImages()->createMany([...$mainImagesResult, ...$categoryImagesResult]);
    }

    /**
     * @param  array<int,mixed>  $galleryImages
     */
    protected function createGalleryImages(array $galleryImages): void
    {

        $galleryResult = $this->getTransformer()->transformGalleryImages($galleryImages);

        self::galleryImages()->createMany($galleryResult);
    }

    /**
     * @param  array<int,mixed>  $productInclusions
     */
    protected function createInclusions(array $productInclusions): void
    {
        $inclusionsResult = $this->getTransformer()->transformInclusions($productInclusions);
        self::productInclusions()->createMany($inclusionsResult);
    }
}
