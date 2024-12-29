<?php

namespace App\Models;

use App\Enums\ImageType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function createWithAllRelatedTables(array $mainImages, array $categoryImages, array $galleryImages, array $productInclusions)
    {

        $mainImagesresult = collect($mainImages)->map(function (string $image, string $deviceType) {
            return [
                'image_type' => ImageType::MAIN,
                'image_path' => $image,
                'device_type' => $deviceType,
            ];

        })->values()->all();

        $categoryImagesresult = collect($categoryImages)->map(function (string $image, string $deviceType) {
            return [
                'image_type' => ImageType::CATEGORY,
                'image_path' => $image,
                'device_type' => $deviceType,
            ];

        })->values()->all();

        self::productImages()->createMany([...$mainImagesresult, ...$categoryImagesresult]);

        $galleryResult = collect($galleryImages)->flatMap(function (array $images, string $position) {

            return collect($images)->map(function (string $imagePath, string $deviceType) use ($position) {
                return [
                    'image_position' => $position,
                    'device_type' => $deviceType,
                    'image_path' => $imagePath,
                ];
            })->values();

        })
            ->values()
            ->all();

        self::galleryImages()->createMany($galleryResult);

        $inclusionsResult = collect($productInclusions)->map(function (array $item) {

            return [
                'item_name' => $item['item'],
                'quantity' => $item['quantity'],
            ];

        })->all();

        self::productInclusions()->createMany($inclusionsResult);

        return $this->load('productImages', 'galleryImages', 'productInclusions');
    }
}

// protected $fillable = ['product_id', 'item_name', 'quantity'];
