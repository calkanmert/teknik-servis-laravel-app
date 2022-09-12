<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index() {
        return view('admin.login', [
            'page_title' => 'Giriş Yap | Teknik Servis'
        ]);
    }

    function login(LoginRequest $request) {        
        $credentials = $request->validated();

        if (Auth::attempt($credentials, $request->input('remember') ? true : false)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'auth_error' => 'Girilen eposta veya şifre yanlış.',
        ])->onlyInput('email');
    }

    function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('admin.login.index'));
    }
}
