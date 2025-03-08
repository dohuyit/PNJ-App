<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'voucher_code',
        'voucher_name',
        'description',
        'uses',
        'max_uses',
        'max_uses_user',
        'type',
        'discount_amount',
        'is_fixed',
        'start_date',
        'end_date',
        'delete_at',
    ];

    public function customers()
    {
        return $this->belongsToMany(User::class, 'customer_vouchers', 'voucher_id', 'user_id')
            ->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_vouchers', 'voucher_id', 'product_id')
            ->withTimestamps();
    }
}
