<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'email';

        $login = [
            $loginType => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($login)) {
            if (Auth::user()->level == 'Root') {
                return redirect()->route('root.dashboard');
            } elseif (Auth::user()->level == 'Admin') {
                return redirect()->route('admin.dashboard');
            }
        }

        return redirect()->route('login')->with(['error' => 'Email/Password Salah!']);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
