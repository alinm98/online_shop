<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyGroupsRequest;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;
use function redirect;
use function view;

class PropertyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.propertyGroups.index',[
            'propertyGroups' => PropertyGroup::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.propertyGroups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(PropertyGroupsRequest $request)
    {
        PropertyGroup::query()->create([
            'title' => $request->get('title')
        ]);
        return redirect(route('propertyGroups.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyGroup $propertyGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(PropertyGroup $propertyGroup)
    {
        return view('Admin.propertyGroups.edit',[
            'propertyGroup' =>$propertyGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, PropertyGroup $propertyGroup)
    {
        $propertyGroup->update([
            'title'=>$request->get('title')
        ]);
        return redirect(route('propertyGroups.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(PropertyGroup $propertyGroup)
    {
        $propertyGroup->delete();
        return redirect(route('propertyGroups.index'));
    }
}
