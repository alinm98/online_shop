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

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class , 'category_id');
    }

    public function propertyGroup(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(PropertyGroup::class);
    }

    public function hasPropertyGroup(PropertyGroup $propertyGroup): bool
    {
        return $this->propertyGroup()->where('property_group_id' , $propertyGroup->id)->exists();
    }

    public function getParents()
    {
        return Category::query()->where('category_id' , null)->get();
    }

    public function getSubParents(): array
    {

        $parents = (new \App\Models\Category)->getParents();
        foreach ($parents as $value){
            foreach ($value->children as $val){
                foreach ($val->children as $category){
                    $data[] = $category;
                }
            }
        }
        return $data;
    }
}
