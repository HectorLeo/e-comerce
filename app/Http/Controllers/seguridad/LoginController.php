<?php

namespace App\Http\Controllers\seguridad;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function login(){
        $credentials = $this->validate(request(),[
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);
    }
    
    /*if(Auth::attempt($credentials)){
        return redirect()->route('admin');
    }
    return back()
    ->withErrors(['email' => trans(auth.failed)]);
    ->withInput(request(['email']));

    use AuthenticatesUsers;
    protected $redirectTo = '/admin';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function index()
    {
        return view('seguridad.login');
    }
    public function username()
    {
        return'correo';
    }
    //protected $guard = 'admins';*/
}
