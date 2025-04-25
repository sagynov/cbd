<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /** @use HasFactory<\Database\Factories\BannerFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'button_text',
        'button_link',
        'is_active',
    ];

    public function getImageAttribute($value)
    {
        return $value;
        // return asset('storage/' . $value);
    }
}
