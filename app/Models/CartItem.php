<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'variant_id',
        'quantity'
    ];

    public function cart()
    {
        $this->belongsTo(Cart::class);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class, 'variant_id');
    }
}
