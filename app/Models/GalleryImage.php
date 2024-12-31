<?php

namespace App\Models;

use App\Enums\DeviceType;
use App\Enums\ImagePosition;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryImage extends Model
{
    /** @use HasFactory<\Database\Factories\GalleryImageFactory> */
    use HasFactory;

    protected $fillable = ['product_id', 'image_position', 'device_type', 'image_path'];

    protected function imagePath(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset($value),
            set: fn ($value) => $value
        );
    }

    protected function casts(): array
    {
        return [
            'device_type' => DeviceType::class,
            'image_position' => ImagePosition::class,
        ];
    }

    public function createByPosition(int $productId, array $galleries): void
    {

        $result = collect($galleries)->flatMap(function (array $galleryImages, string $position) use ($productId) {

            $positionEnum = ImagePosition::from($position);
            if (! $positionEnum) {
                throw new \InvalidArgumentException("Invalid Gallery Position: $position");
            }

            return collect($galleryImages)->map(function (string $imagePath, string $deviceType) use ($productId, $positionEnum) {

                $deviceTypeEnum = DeviceType::from($deviceType);
                if (! $deviceTypeEnum) {
                    throw new \InvalidArgumentException("Invalid device type: $deviceType");
                }

                return [
                    'product_id' => $productId,
                    'image_position' => $positionEnum,
                    'device_type' => $deviceType,
                    'image_path' => $imagePath,
                ];
            })->values();

        })
            ->values()
            ->all();

        self::insert($result);
    }

    /**
     * @return BelongsTo<Product,GalleryImage>
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
