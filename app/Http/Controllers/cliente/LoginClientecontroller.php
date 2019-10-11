<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginClientecontroller extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function index(){
        return view('tienda.login-tienda');
    }

    protected function authenticated(Request $request, $user){
        $roles = $user->roles()->where('estado', 1)->get();
        if($roles->isNotEmpty()){
             $user->setSession($roles->toArray());
        }else{
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('cliente/logout')->withErrors(['Error' => 'Este usuario no tiene un rol activo']);
        }
    }
    
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
