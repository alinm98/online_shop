<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.blog.index',[
            'blogs' => Blog::all()
        ]);
    }



    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.blog.create');
    }


    public function store(StoreBlogRequest $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $banner = $request->file('banner')->store('public/images/blogs/banners');
        $image = $request->file('image')->store('public/images/blogs/images');
        Blog::query()->create([
            'title' => $request->get('title'),
            'banner' => $banner,
            'image' => $image,
            'body' => $request->get('body'),
        ]);

        return redirect(route('blogs.index'));
    }


    public function edit(Blog $blog): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.blog.edit',[
            'blog' => $blog
        ]);
    }



    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $banner = $blog->banner;
        $image = $blog->image;

        if (!empty($request->file('banner'))){
            Storage::delete($banner);
            $banner = $request->file('banner')->store('public/images/blogs/banners');
        }

        if (!empty($request->file('image'))){
            Storage::delete($image);
            $image = $request->file('image')->store('public/images/blogs/images');
        }

        $blog->update([
            'image' => $image,
            'banner' => $banner,
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);

        return redirect(route('blogs.index'));
    }

    public function destroy(Blog $blog)
    {
        Storage::delete($blog->banner);
        Storage::delete($blog->image);
        $blog->delete();
        return redirect(route('blogs.index'));
    }
}
