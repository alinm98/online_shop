<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Client.blog.index',[
            'blogs' => Blog::all()
        ]);
    }

    public function show(Blog $blog): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Client.blog.show',[
            'blog' => $blog,
            'date' => \verta($blog->created_at)->format('Y.m.d')
        ]);
    }
}
