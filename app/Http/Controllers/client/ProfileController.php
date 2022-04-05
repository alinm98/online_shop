<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
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

    public function edit()
    {
        return view('Client.profiles.edit',[
            'user' => auth()->user(),
        ]);
    }

    public function update(User $user , Request $request)
    {
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'code_melli' => $request->get('code_melli'),
            'mobile' => $request->get('mobile'),
        ]);
        return redirect(route('home.profile.index'));
    }
}
