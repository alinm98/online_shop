<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.banners.index',[
            'banners' =>Banner::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function create()
    {
        return view('Admin.banners.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $location = $request->get('location');
        if ($location == 1){
            $this->validate($request,[
                'image' =>
                    'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=1780,height=890'
            ]);
        }
        if ($location == 2 or $location == 3){
            $this->validate($request,[
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=856,height=428'

            ]);
        }
        $image = $request->file('image')->store('public/images/banners');
        Banner::query()->create([
            'image' => $image,
            'location' => $location
        ]);

        return redirect(route('banners.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Banner $banner): \Illuminate\Http\RedirectResponse
    {
        $banner->delete();
        return redirect()->back();
    }
}
