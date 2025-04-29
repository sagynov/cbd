<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'title', 'slug', 'description', 'image'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
