<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "banner_image",
        "description",
        "category_id",
        "is_active",
    ];
}
