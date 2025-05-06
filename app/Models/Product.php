<?php

namespace App\Models;

use App\Enums\ProductOption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = ['name', 'sku', 'slug', 'is_active', 'has_variants', 'description', 'images', 'category_id', 'price'];

    protected $appends = ['image_links', 'flavor_variants', 'strength_variants'];

    protected $casts = [
        'images' => 'array',
        'price' => 'integer',
        'old_price' => 'integer',
    ];

    public function getImageLinksAttribute()
    {
        return array_map(function ($image) {
            return asset('storage/' . $image);
        }, $this->images ?? $this->variants->first()?->images ?? []);
    }

    public function getPriceAttribute()
    {
        return $this->variants->first()?->price ?? $this->price;
    }
    public function getOldPriceAttribute()
    {
        return $this->variants->first()?->old_price ?? $this->old_price;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
    public function getFlavorVariantsAttribute()
    {
        return $this->variants->filter(function ($variant) {
            return $variant->flavor;
        })->unique('flavor');
    }
    public function getStrengthVariantsAttribute()
    {
        return $this->variants->filter(function ($variant) {
            return $variant->strength;
        })->unique('strength');
    }

}
