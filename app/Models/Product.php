<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = ['name', 'description', 'images', 'category_id', 'price'];

    protected $casts = [
        'images' => 'array',
        'price' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
