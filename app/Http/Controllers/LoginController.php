<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('admin.login');
    }

    public function auth(Request $request)
    {

        $credentials = $request->only('login', 'password');
        $auth = Auth::attempt($credentials);

        if (!$auth) {
            return redirect()->route('login.index')->withErrors('Login ou senha incorretos!');
        }
        return redirect()->route('admin.home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
