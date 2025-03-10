<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'banner_image',
        'link',
        'position',
        'reference_table',
        'reference_id',
        'priority',
        'is_active',
    ];
}
