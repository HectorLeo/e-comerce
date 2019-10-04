<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function login(){
        $credentials = $this->validate(request(),[
            'email' => 'email|required|string',
            'password' => '|required|string'
        ]);
        
        if(Auth::attempt($credentials)){
            return 'Tu sesion ha iniciado correctamente';
        }
        return back()
        ->withErrors(['email'=> trans('auth.failed')])
        ->withInput(request(['email']));
    }
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

   // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * 
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     *
     */
    //public function __construct()
    //{
       // $this->middleware('guest')->except('logout');
    //}
}
