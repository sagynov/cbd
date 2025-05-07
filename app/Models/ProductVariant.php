<?php

namespace App\Models;

use App\Enums\ProductOption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    /** @use HasFactory<\Database\Factories\ProductVariantFactory> */
    use HasFactory;

    protected $fillable = [
        'id',
        'product_id',
        'sku',
        'is_active',
        'flavor',
        'strength',
        'price',
        'old_price',
        'stock',
        'images',
    ];

    protected $appends = ['image_links'];

    protected $casts = [
        'images' => 'array',
        'price' => 'integer',
        'old_price' => 'integer',
    ];

    public function getImageLinksAttribute()
    {
        return array_map(function ($image) {
            return asset('storage/' . $image);
        }, $this->images);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}