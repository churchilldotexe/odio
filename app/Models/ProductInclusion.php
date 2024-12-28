<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductInclusion extends Model
{
    /** @use HasFactory<\Database\Factories\ProductInclusionFactory> */
    use HasFactory;

    protected $fillable = ['product_id', 'item_name', 'quantity'];

    /**
     * @return BelongsTo<Product,ProductImage>
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
