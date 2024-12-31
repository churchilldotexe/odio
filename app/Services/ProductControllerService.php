<?php

namespace App\Services;

use Illuminate\Support\Collection;

class ProductControllerService
{
    public static function groupRelatedProducts(Collection $images, string $groupingName): array
    {
        return $images
            ->groupBy($groupingName)
            ->map(function ($group) {
                return $group->mapWithKeys(function ($item) {
                    return [$item->device_type->value => $item->image_path];
                });
            })
            ->toArray();
    }
}
