<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Collection;

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
        $product = Product::query()->where('inventory',1);
        return view('Client.products.search', [
            'products_most_view'=> $product->orderBy('visit')->get() ,
            'products_most_new'=> $product->orderBy('created_at')->get() ,
            'products_most_buy'=> $product->orderBy('buy_count')->get() ,
            'products_most_price'=> $product->orderByDesc('price')->get() ,
            'products_lowest_price'=> $product->orderBy('price' , 'asc')->get() ,
            'products_data' => $product->get(),
            'category_data' => $categories,
            'brands_data' => Brand::all(),
        ]);
    }

    public function search(Request $request)
    {

        $product = Product::query()->where('inventory',1);
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

    public function subChildrenSearch(Category $category): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $product = Product::query()->where('inventory',1)->where('category_id',$category->id)->get();

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

    public function subCategorySearch(Category $category): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = $category->children()->get();
        $products = array();
        $products[] = Product::query()->where('inventory',1)->where('category_id',$category->id)->get();
        foreach ($categories as $value){
            $products[] = Product::query()->where('inventory',1)->where('category_id',$value->id)->get();
        }

        $result = collect();
        foreach ($products as $value){
            foreach ($value as $val){
                $result->push($val);
            }
        }

        $products_most_view = $result->sortByDesc('visit');
        $products_most_new = $result->sortByDesc('created_at');
        $products_most_buy = $result->sortByDesc('buy_count');
        $products_most_price = $result->sortByDesc('price');
        $products_lowest_price = $result->sortBy('price');


        return view('Client.products.search', [
            'products_most_view' => $products_most_view,
            'products_most_new' => $products_most_new,
            'products_most_buy'=>$products_most_buy,
            'products_most_price' =>$products_most_price,
            'products_lowest_price'=>$products_lowest_price,
            'products_data' => $result,
            'category_data' => (new \App\Models\Category)->getSubParents(),
            'brands_data' => Brand::all(),
        ]);
    }

    public function CategorySearch(Category $category): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = $category->children;

        $products =array();

        foreach ($categories as $value){

            $products[] = Product::query()->where('inventory',1)->where('category_id',$value->id)->get();
            foreach ($value->children as $val){
                $products[] = Product::query()->where('inventory',1)->where('category_id',$val->id)->get();

            }
        }
        //dd($products[0][0]);
        $result = collect();
        foreach ($products as $value){
            foreach ($value as $val){
                $result->push($val);
            }
        }



        $products_most_view = $result->sortByDesc('visit');
        $products_most_new = $result->sortByDesc('created_at');
        $products_most_buy = $result->sortByDesc('buy_count');
        $products_most_price = $result->sortByDesc('price');
        $products_lowest_price = $result->sortBy('price');

        return view('Client.products.search', [
            'products_most_view' => $products_most_view,
            'products_most_new' => $products_most_new,
            'products_most_buy'=>$products_most_buy,
            'products_most_price' =>$products_most_price,
            'products_lowest_price'=>$products_lowest_price,
            'products_data' => $result,
            'category_data' => (new \App\Models\Category)->getSubParents(),
            'brands_data' => Brand::all(),
        ]);
    }

    public function searchInput(Request $request)
    {
        $search = '%'.$request->get('search').'%';
        $product = Product::query()->where('inventory',1)->where('name','like' ,$search)->get();

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
