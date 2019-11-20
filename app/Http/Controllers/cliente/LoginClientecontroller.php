<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginClientecontroller extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/cliente/cliente';

    public function __construct()
    {
        $this->middleware('guest')->except('logoutC');
    }
    
    public function index(){
        $cart = \Session::get('cart');
        return view('tienda.login-tienda',compact('cart'));
    }

    protected function authenticated(Request $request, $user){
        $roles = $user->roles()->where('estado', 1)->get();
        if($roles->isNotEmpty()){
             $user->setSession($roles->toArray());
        }else{
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('cliente/logoutC')->withErrors(['Error' => 'Este usuario no tiene un rol activo']);
        }
    }
    
    public function logoutC(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
