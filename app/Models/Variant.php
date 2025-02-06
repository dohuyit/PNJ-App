<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'attribute_id',
        'price_variant',
    ];
    public function store()
    {
        return $this->belongsTo(ShopStore::class, 'store_id');
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id')->with('attributegroups');
    }
}
