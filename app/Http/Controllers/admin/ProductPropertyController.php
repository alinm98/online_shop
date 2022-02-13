<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use function collect;
use function redirect;
use function view;

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
