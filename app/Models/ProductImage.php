<?php

namespace App\Models;

use App\Enums\DeviceType;
use App\Enums\ImageType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    /** @use HasFactory<\Database\Factories\ProductImageFactory> */
    use HasFactory;

    protected $fillable = ['product_id', 'image_type', 'device_type', 'image_path'];

    /**
     * @param  array<int,mixed>  $images
     */
    public function createByType(int $productId, ImageType $imageType, array $images): void
    {

        collect($images)->each(function (string $image, string $deviceType) use ($productId, $imageType) {
            self::create([
                'product_id' => $productId,
                'image_type' => $imageType,
                'image_path' => $image,
                'device_type' => $deviceType,
            ]);
        });
    }

    protected function casts(): array
    {
        return [
            'image_type' => ImageType::class,
            'device_type' => DeviceType::class,
        ];
    }

    /**
     * @return BelongsTo<Product,ProductImage>
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
