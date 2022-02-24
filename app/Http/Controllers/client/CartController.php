<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $carts = auth()->user()->cart;
        if (empty($carts->toArray())){
            return view('Client.carts.empty');
        }
        return view('Client.carts.index',[
            'carts' => $carts,
            'total' => 0 ,
            'count' => count(auth()->user()->cart) ,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request , Product $product)
    {
        Cart::query()->create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
        ]);
        return redirect(\route('home.cart.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->back();
    }

    public function confirmation()
    {
        $carts = auth()->user()->cart;
        $cost=0;
        foreach ($carts as $cart){
            if (empty($cart->product->discount)) {
                $cost += $cart->product->price;
            }
            else{
                $cost += $cart->product->getDiscount();
            }
        }
        return view('Client.carts.shopping',[
            'address' => auth()->user()->address[0],
            'carts' => $carts,
            'total' => $cost ,
            'count' => count(auth()->user()->cart) ,

        ]);
    }
}
