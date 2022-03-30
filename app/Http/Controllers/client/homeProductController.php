<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeProductController extends Controller
{
    public function show(Product $product)
    {
        $count = Comment::query()->count();
        $data = (new Comment())->average($count);
        return view('Client.products.single', [
            'product' => $product,
            'gallery' => $product->gallery,
            'propertyGroups' => $product->category->propertyGroup,
            'count' => $count,
            'data' => $data,
            'comments' => Comment::all(),
        ]);
    }

    public function index()
    {
        //$product = (Product::all())->toArray();
        $categories = (new \App\Models\Category)->getSubParents();
        return view('Client.products.search', [
            'products_data' => Product::all(),
            'category_data' => $categories,
            'brands_data' => Brand::all(),
        ]);
    }

    public function search(Request $request)
    {

        $product = Product::query();
        if ($request->has('categories')) {
            foreach ($request->categories as $category) {
                $product = $product->where('category_id', $category)->get();
            }
        }

        if ($request->has('brands')) {
            foreach ($request->brands as $brand) {
                $product = $product->where('brand_id', $brand)->get();
            }
        }
        return view('Client.products.search', [
            'products_data' => $product,
            'category_data' => (new \App\Models\Category)->getSubParents(),
            'brands_data' => Brand::all(),
        ]);

    }
}
