<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JewelryLine extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'banner_image',
        'description',
        'is_wedding',
        'is_active',
    ];
}
