<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'original_price',
        'sale_price',
        'product_image',
        'description',
        'is_featured',
        'product_status',
        'category_id',
        'jewelry_line_id',
        'collection_id',
        'brand_id',
        'product_type_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function jewelryLine()
    {
        return $this->belongsTo(JewelryLine::class);
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function albumImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function discounts()
    {
        return $this->hasMany(ProductDiscount::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class, 'product_vouchers');
    }
}
