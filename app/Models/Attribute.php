<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "group_attribute_id",
        "is_wedding",
    ];

    public function attributegroups()
    {
        return $this->belongsTo(AttributeGroup::class, 'group_attribute_id');
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
