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
        'name', 'price', 'description', 'image', 'category_id', 'brand_id', 'buy_count', 'visit'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function gallery(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function discount(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Discount::class);
    }

    public function color(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Color::class);
    }

    public function hasDiscount(): bool
    {
        if ($this->discount()->exists()) {
            return $this->discount->value;
        } else {
            return false;
        }
    }

    public function addDiscount(DiscountRequest $request)
    {
        if (!$this->discount()->exists()) {
            $this->discount()->create([
                'value' => $request->get('value'),
            ]);
        } else {
            $this->discount()->update([
                'value' => $request->get('value'),
            ]);
        }
    }

    public function properties(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Property::class)
            ->withPivot('value')
            ->withTimestamps();
    }

    public function getDiscount()
    {
        $price = $this->price;
        $discount = $this->discount->value;
        return $price - $price * $discount / 100;
    }

    public function hasColor(Color $color): bool
    {
        return $this->color()->where('color_id', $color->id)->exists();
    }


}
