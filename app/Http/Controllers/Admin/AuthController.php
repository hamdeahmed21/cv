<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        $userData = $request->only(['email', 'password']);
        if(Auth::attempt($userData))
        {
            return redirect(route('admin.home'));
        }

        return back()->withErrors(['user not found']);
    }
    public function logout()
    {
        Session::flush();

        Auth::logout();
        return redirect()->route('login');
    }
}
