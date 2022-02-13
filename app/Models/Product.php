<?php

namespace App\Models;

use App\Http\Requests\DiscountRequest;
use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'description', 'image', 'category_id', 'brand_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

    public function hasDiscount()
    {
        if ($this->discount()->exists()){
            return $this->discount->value;
        }

        else{
            return false;
        }
    }

    public function addDiscount(DiscountRequest $request)
    {
        if (!$this->discount()->exists()){
            $this->discount()->create([
                'value' => $request->get('value'),
            ]);
        }
        else{
            $this->discount()->update([
                'value' => $request->get('value'),
            ]);
        }
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class)
            ->withPivot('value')
            ->withTimestamps();
    }

    public function getDiscount()
    {
        $price = $this->price;
        $discount = $this->discount->value;
        return $price - $price*$discount/100;
    }


}
