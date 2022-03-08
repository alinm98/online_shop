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
            'total' =>$order->detail[0]->total
        ]);
    }
}
