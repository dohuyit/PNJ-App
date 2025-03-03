<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'user_id',
        'name',
        'email',
        'phone',
        'date',
        'total_amount',
        'city_id',
        'district_id',
        'ward_id',
        'note',
        'payment_method_id',
        'status_id',
        'transaction_code',
        'payment_status',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
