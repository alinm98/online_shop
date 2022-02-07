<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductPropertyController extends Controller
{
    public function index(Product $product)
    {
        return view('Admin.productProperties.index',[
            'propertyGroups' => $product->category->propertyGroup,
            'product' => $product
        ]);
    }

    public function store(Request $request , Product $product)
    {
        $properties = collect($request->get('properties'))->filter(function ($item){
            if (!empty($item['value'])){
                return $item;
            }
        });
        $product->properties()->sync($properties);

        return redirect()->back();
    }
}
