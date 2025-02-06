<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $fillable = [
        'name',
        'description',
        'banner_image',
        'is_active',
    ];

    public function productTypes()
    {
        return $this->hasMany(ProductType::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
