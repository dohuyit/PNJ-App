<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo_brand',
        'image_thumbnail',
        'banner_image',
        'description',
        'is_active'
    ];
}
