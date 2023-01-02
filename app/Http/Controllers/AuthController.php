<?php

namespace App\Http\Controllers;


use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    protected function authenticated(Request $request, $user)
    {
        $user->forceFill([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ])->save();
    }
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

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $this->authenticated($request, $user); // <-- tambahkan baris ini
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level == 'operator') {
                return redirect()->intended('operator');
            } elseif ($user->level == 'readonly') {
                return redirect()->intended('readonly');
            }
        }

        return $this->sendFailedLoginResponse($request)->withErrors([
            'email' => 'Credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }
}
