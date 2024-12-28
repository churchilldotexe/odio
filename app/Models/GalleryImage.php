<?php

namespace App\Models;

use App\Enums\DeviceType;
use App\Enums\ImagePosition;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryImage extends Model
{
    /** @use HasFactory<\Database\Factories\GalleryImageFactory> */
    use HasFactory;

    protected $fillable = ['product_id', 'image_position', 'device_type', 'image_path'];

    protected function casts(): array
    {
        return [
            'device_type' => DeviceType::class,
            'image_position' => ImagePosition::class,
        ];
    }

    public function createByPosition(int $productId, string $position, array $galleryImages): void
    {
        $positionEnum = ImagePosition::from($position);

        collect($galleryImages)->each(function (string $imagePath, string $deviceType) use ($productId, $position) {
            self::create([
                'product_id' => $productId,
                'image_position' => $position,
                'device_type' => $deviceType,
                'image_path' => $imagePath,
            ]);
        });
    }

    /**
     * @return BelongsTo<Product,GalleryImage>
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
