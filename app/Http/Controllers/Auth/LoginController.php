<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
   
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/beranda';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => 'required|string', 
    //         'password' => 'required|string|min:3',
    //     ]);
    //     $loginType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    //     $login = [
    //         $loginType => $request->email,
    //         'password' => $request->password
    //     ];
    
    //     if (auth()->attempt($login)) {
    //         return redirect()->route('beranda');
    //     }
    //     return redirect()->route('login')->with(['error' => 'Email/Password salah!']);
    // }
}
