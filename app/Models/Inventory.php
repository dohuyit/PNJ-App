<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'variant_id',
        'store_id',
        'quantity',
    ];

    public function store()
    {
        return $this->belongsTo(ShopStore::class, 'store_id');
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}
