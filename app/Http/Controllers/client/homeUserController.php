<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientLoginRequest;
use App\Http\Requests\ClientRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeUserController extends Controller
{
    public function signup()
    {
        return view('Client.users.register');
    }

    public function signupStore(ClientRegisterRequest $request)
    {
        User::query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'password' => $request->get('password'),
            'role_id' => 2
        ]);

        return redirect(route('home.index'));
    }

    public function showLogin()
    {
        return view('Client.users.login');
    }

    public function login(ClientLoginRequest $request)
    {
        $user = User::query()->where('email', $request->get('email'))->firstOrFail();
        if ($user->password != $request->get('password')) {
            return redirect()->back()->withErrors(['password' => 'password is not correct']);
        }
        \auth()->login($user);
        return redirect(route('home.index'));
    }

    public function logout()
    {
        \auth()->logout();
        return redirect(route('home.user.showLogin'));
    }
}
