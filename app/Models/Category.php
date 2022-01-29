<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'title' , 'category_id' , 'property_groups'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function propertyGroup()
    {
        return $this->belongsToMany(PropertyGroup::class);
    }

    public function hasPropertyGroup(PropertyGroup $propertyGroup)
    {
        return $this->propertyGroup()->where('property_group_id' , $propertyGroup->id)->exists();
    }
}
