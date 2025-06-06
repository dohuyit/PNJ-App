<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_thumbnail',
        'description',
        'banner_image',
        'brand_id',
        'is_wedding_collection',
        'is_active',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
