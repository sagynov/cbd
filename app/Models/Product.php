<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'images', 'category_id', 'price'];

    protected $casts = [
        'images' => 'array',
        'price' => 'integer',
    ];

    public function getImagesAttribute($value)
    {
        return array_map(function ($image) {
            return asset('storage/' . $image);
        }, json_decode($value, true));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
