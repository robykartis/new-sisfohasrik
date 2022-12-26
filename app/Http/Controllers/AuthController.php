<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level == 'operator') {
                return redirect()->intended('operator');
            } elseif ($user->level == 'readonly') {
                return redirect()->intended('readonly');
            }
        }
        return view('auth.login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );

        $kredensil = $request->only('email', 'password');

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level == 'editor') {
                return redirect()->intended('editor');
            }
            return redirect()->intended('/');
        }

        return redirect('/')
            ->with('error', 'Email-Address And Password Are Wrong.');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }
}
