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
        $product->update([
            'visit' => $product->visit +1
        ]);

        $count = Comment::query()->count();
        $data = (new Comment())->average($count);
        return view('Client.products.single', [
            'product' => $product,
            'gallery' => $product->gallery,
            'propertyGroups' => $product->category->propertyGroup,
            'count' => $count,
            'data' => $data,
            'comments' => Comment::all(),
            'colors' => $product->color,
        ]);
    }

    public function index()
    {
        ;
        $categories = (new \App\Models\Category)->getSubParents();
        return view('Client.products.search', [
            'products_most_view'=> Product::query()->orderBy('visit')->get() ,
            'products_most_new'=> Product::query()->orderBy('created_at')->get() ,
            'products_most_buy'=> Product::query()->orderBy('buy_count')->get() ,
            'products_most_price'=> Product::query()->orderByDesc('price')->get() ,
            'products_lowest_price'=> Product::query()->orderBy('price' , 'asc')->get() ,
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

        $products_most_view = $product->sortByDesc('visit');
        $products_most_new = $product->sortByDesc('created_at');
        $products_most_buy = $product->sortByDesc('buy_count');
        $products_most_price = $product->sortByDesc('price');
        $products_lowest_price = $product->sortBy('price');


        return view('Client.products.search', [
            'products_most_view' => $products_most_view,
            'products_most_new' => $products_most_new,
            'products_most_buy'=>$products_most_buy,
            'products_most_price' =>$products_most_price,
            'products_lowest_price'=>$products_lowest_price,
            'products_data' => $product,
            'category_data' => (new \App\Models\Category)->getSubParents(),
            'brands_data' => Brand::all(),
        ]);

    }

    public function subChildrenSearch(Category $category)
    {
        $product = Product::query()->where('category_id',$category->id)->get();


        $products_most_view = $product->sortByDesc('visit');
        $products_most_new = $product->sortByDesc('created_at');
        $products_most_buy = $product->sortByDesc('buy_count');
        $products_most_price = $product->sortByDesc('price');
        $products_lowest_price = $product->sortBy('price');

        return view('Client.products.search', [
            'products_most_view' => $products_most_view,
            'products_most_new' => $products_most_new,
            'products_most_buy'=>$products_most_buy,
            'products_most_price' =>$products_most_price,
            'products_lowest_price'=>$products_lowest_price,
            'products_data' => $product,
            'category_data' => (new \App\Models\Category)->getSubParents(),
            'brands_data' => Brand::all(),
        ]);
    }

    public function subCategorySearch(Category $category)
    {
        $categories = $category->children()->get();
        $product = Product::query();
        foreach ($categories as $value){
            $product = $product->where('category_id',$value->id)->get();
        }

        $products_most_view = $product->sortByDesc('visit');
        $products_most_new = $product->sortByDesc('created_at');
        $products_most_buy = $product->sortByDesc('buy_count');
        $products_most_price = $product->sortByDesc('price');
        $products_lowest_price = $product->sortBy('price');


        return view('Client.products.search', [
            'products_most_view' => $products_most_view,
            'products_most_new' => $products_most_new,
            'products_most_buy'=>$products_most_buy,
            'products_most_price' =>$products_most_price,
            'products_lowest_price'=>$products_lowest_price,
            'products_data' => $product,
            'category_data' => (new \App\Models\Category)->getSubParents(),
            'brands_data' => Brand::all(),
        ]);
    }

    public function CategorySearch(Category $category)
    {
        $categories = $category->children;
        $product = Product::query();
        foreach ($categories as $value){
            foreach ($value->children as $val){
                $product = $product->where('category_id',$val->id)->get();
            }
        }

        $products_most_view = $product->sortByDesc('visit');
        $products_most_new = $product->sortByDesc('created_at');
        $products_most_buy = $product->sortByDesc('buy_count');
        $products_most_price = $product->sortByDesc('price');
        $products_lowest_price = $product->sortBy('price');

        return view('Client.products.search', [
            'products_most_view' => $products_most_view,
            'products_most_new' => $products_most_new,
            'products_most_buy'=>$products_most_buy,
            'products_most_price' =>$products_most_price,
            'products_lowest_price'=>$products_lowest_price,
            'products_data' => $product,
            'category_data' => (new \App\Models\Category)->getSubParents(),
            'brands_data' => Brand::all(),
        ]);
    }

    public function searchInput(Request $request)
    {
        $search = '%'.$request->get('search').'%';
        $product = Product::query()->where('name','like' ,$search)->get();

        $products_most_view = $product->sortByDesc('visit');
        $products_most_new = $product->sortByDesc('created_at');
        $products_most_buy = $product->sortByDesc('buy_count');
        $products_most_price = $product->sortByDesc('price');
        $products_lowest_price = $product->sortBy('price');


        return view('Client.products.search', [
            'products_most_view' => $products_most_view,
            'products_most_new' => $products_most_new,
            'products_most_buy'=>$products_most_buy,
            'products_most_price' =>$products_most_price,
            'products_lowest_price'=>$products_lowest_price,
            'products_data' => $product,
            'category_data' => (new \App\Models\Category)->getSubParents(),
            'brands_data' => Brand::all(),
        ]);
    }



}
