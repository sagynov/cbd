<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'title', 'slug', 'description', 'image'];

    protected $appends = ['image_link'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function getImageLinkAttribute()
    {
        return asset('storage/' . $this->image);
    }
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }
}
