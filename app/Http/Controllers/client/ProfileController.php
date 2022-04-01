<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('Client.profiles.index');
    }

    public function comment()
    {
        return view('Client.profiles.comments' ,[
            'comments' => auth()->user()->comments
        ]);
    }

    public function order()
    {
        return view('Client.profiles.orders',[
            'orders' => auth()->user()->orders,
        ]);
    }
}
