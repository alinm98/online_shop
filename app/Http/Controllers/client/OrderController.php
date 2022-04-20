<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use function auth;
use function view;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.orders.index',[
            'orders' => Order::query()->where('confirm' , null)->get(),
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector|Payment
     * @throws \Exception
     */
    public function store($total)
    {
        $order = Order::query()->create([
            'user_id' => auth()->user()->id ,
            'status' => 'wait' ,
            'total' => $total
        ]);
        foreach (auth()->user()->cart as $cart){
            OrderDetail::query()->create([
                'product_id' => $cart->product_id,
                'order_id' => $order->id,
                'total' => $total,
                'count' => $cart->count,
                'color_id' => $cart->color_id
            ]);
            $cart->addOneToProductBuyCount();
            $cart->delete();
        }
        $invoice = (new Invoice)->amount($total);


        return Payment::purchase($invoice , function ($driver , $transactionId) use ($order){
            $order->update([
                'transaction_id' => $transactionId,
            ]);
        })->pay()->render();

    }

    public function payFailedPayment(Order $order)
    {
        $invoice = (new Invoice)->amount($order->total);
        return Payment::purchase($invoice ,function ($driver , $transactionId) use ($order){
            $order->update([
                'transaction_id' => $transactionId,
            ]);
        })->pay()->render();
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $order = Order::query()->where('transaction_id' , $request->get('Authority'))->first();
        if ($request->get('Status') == 'OK'){
            $order->update([
                'status' => 'OK'
            ]);
            return view('Client.carts.success');
        }
        return view('Client.carts.failed');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update( Order $order)
    {
        $test = $order->update([
            'confirm' => 1
        ]);
        return redirect(route('order.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Order $order): \Illuminate\Http\RedirectResponse
    {
        foreach ($order->detail as $detail){
            $detail->delete();
        }
        $order->delete();
        return redirect(route('order.index'));
    }

    public function destroyConfirm(Order $order): \Illuminate\Http\RedirectResponse
    {
        foreach ($order->detail as $detail){
            $detail->delete();
        }
        $order->delete();
        return redirect(route('order.confirm'));
    }

    public function confirm()
    {
        return view('Admin.orders.confirmed',[
            'orders' => Order::query()->where('confirm' , 1)->get(),
        ]);
    }
}
