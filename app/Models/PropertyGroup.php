<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyGroup extends Model
{
    use HasFactory;

    protected $fillable=[
        'title'
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function property()
    {
        return $this->hasMany(Property::class);
    }
}
