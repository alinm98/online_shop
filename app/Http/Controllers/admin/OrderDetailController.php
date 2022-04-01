<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index(Order $order)
    {
        return view('Admin.orders.detail',[
            'order'=>$order,
            'details' =>$order->detail,
            'total' =>$order->total
        ]);
    }

    public function indexConfirm(Order $order)
    {
        return view('Admin.orders.detail.confirm',[
            'order'=>$order,
            'details' =>$order->detail,
            'total' =>$order->total
        ]);
    }


}
