<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function redirect;
use function view;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.products.index' ,[
            'products' =>Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.products.create' ,[
            'categories'=>Category::all(),
            'brands'=>Brand::all(),
            'colors' =>Color::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(ProductRequest $request)
    {
        $image = $request->file('image')->store('public/images/products');
        $product = Product::query()->create([
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
            'description'=>$request->get('description'),
            'image'=>$image,
            'category_id'=>$request->get('category_id'),
            'brand_id'=>$request->get('brand_id'),
        ]);

        $product->color()->attach($request->get('colors'));

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('Admin.products.edit' ,[
            'product' => $product,
            'categories'=>Category::all(),
            'brands'=>Brand::all(),
            'colors' => Color::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Product $product)
    {
        $image=$product->image;
        if ($request->file('image')!=null) {
            $image = $request->file('image')->store('public/images/products');
            Storage::delete($product->image);
        }
        $product->update([
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
            'description'=>$request->get('description'),
            'image'=>$image,
            'category_id'=>$request->get('category_id'),
            'brand_id'=>$request->get('brand_id'),
        ]);

        $product->color()->sync($request->get('colors'));

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Product $product)
    {
        $product->color()->detach();
        $product->delete();
        return redirect(route('products.index'));

    }
}
