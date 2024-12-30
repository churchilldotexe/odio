<?php

namespace App\Services;

use App\Enums\ImageType;

class ProductModelTransformer
{
    /**
     * @param  array<string,string>  $productImages
     */
    public static function transformProductImages(array $productImages, ImageType $imageType): array
    {
        return collect($productImages)->map(function (string $image, string $deviceType) use ($imageType) {
            return [
                'image_type' => $imageType,
                'image_path' => $image,
                'device_type' => $deviceType,
            ];

        })->values()->all();
    }

    /**
     * @param  array<string,array>  $galleryImages
     */
    public static function transformGalleryImages(array $galleryImages): array
    {

        return collect($galleryImages)->flatMap(function (array $images, string $position) {

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

    }

    /**
     * @param  array<string,string>  $productInclusions
     */
    public static function transformInclusions(array $productInclusions): array
    {

        return collect($productInclusions)->map(function (array $item) {

            return [
                'item_name' => $item['item'],
                'quantity' => $item['quantity'],
            ];

        })->all();
    }
}
