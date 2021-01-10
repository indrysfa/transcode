<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('postLogout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function getLogin()
    {
        return view('auth.admin.login');
    }

    // set untuk login
    public function username()
    {
        return 'username';
    }

    // include login
    public function postLogin(Request $request)
    {   
        $this->validate($request, [
            'username' => 'required\min:4',
            'password' => 'required\min:8',
        ]);

        if (auth()->guard('admin')->attempt($request->only('username','password'))) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request); 
            return redirect()->intended('/admin/home');
        } else {
            $this->incrementLoginAttempts($request);
            return redirect()
            ->back()
            ->withInput()
            ->withErrors('Login Detail Salah');
        }
    }

    // clear session
    public function postLogout(Request $request)
    {
        $sesionKey = $this->guard()->getName();

        $this->guard()->logout();

        $request->session()->forget($sesionKey);

        return redirect()->route('admin.login');
    }
}
