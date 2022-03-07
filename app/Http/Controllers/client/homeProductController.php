<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeProductController extends Controller
{
    public function show(Product $product)
    {
        return view('Client.products.single', [
            'product' => $product,
            'gallery' => $product->gallery,
            'propertyGroups' => $product->category->propertyGroup,
        ]);
    }

    public function index()
    {
        $categories = (new \App\Models\Category)->getSubParents();
        return view('Client.products.search' , [
            'products_data' => Product::paginate(20),
            'category_data' => $categories ,
            'brands_data' => Brand::all(),
        ]);
    }

    public function search(Request $request)
    {

        foreach ($request->categories as $category){
            $product[] = Product::query()->where('category_id' , $category)->get();
        }
        return view('Client.products.search',[
            'products_data' => $product[0],
            'category_data' => (new \App\Models\Category)->getSubParents() ,
            'brands_data' => Brand::all(),
        ]);

    }
}
