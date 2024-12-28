<?php

namespace App\Models;

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

    public function createWithImages()
    {
        // assumming that the product is itterated
        // create the product and get the return
        // the return id will be used to create the other table

        // $this->productImages()->create($productImages);
        // $this->productImages()->create($galleryImages);
        // $this->productImages()->create($productInclusions);

        return $this->load('productImages', 'galleryImages', 'productInclusions');
    }
}
