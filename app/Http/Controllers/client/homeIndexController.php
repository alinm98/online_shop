<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class homeIndexController extends Controller
{

    public function home()
    {
        return view('Client.welcome',[
            'total' => 0,
            'main_banners' => Banner::query()->where('location' , 1)->get(),
            'left_top_banner' => Banner::query()->where('location',2)->first(),
            'left_bottom_banner' => Banner::query()->where('location',3)->first(),
        ]);
    }
}
