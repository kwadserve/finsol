<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'numeric'],
            'password' => ['required'],
        ]);

        if(strlen($request->email) === 10)
        {
            Auth::attempt(['mobile' => $request->email, 'password' => $request->password], $request->remember);
            return redirect()->route('home');
        } else {
            Auth::attempt(['aadhaar' => $request->email, 'password' => $request->password], $request->remember);
            return redirect()->route('home');
        }
    }
}
