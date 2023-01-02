<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use AuthenticatesUsers;

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
        $messages = [
            'email.required' => 'Email is required!',
            'password.required' => 'Password is required!'
        ];
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], $messages);

        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = $this->guard()->user();
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level == 'operator') {
                return redirect()->intended('operator');
            } elseif ($user->level == 'readonly') {
                return redirect()->intended('readonly');
            }
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request)->withErrors([
            'email' => 'sdasas credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }
}
