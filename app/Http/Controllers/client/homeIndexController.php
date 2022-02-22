<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeIndexController extends Controller
{
    public function home()
    {

        return view('Client.welcome',[
            'total' => 0
        ]);
    }
}
