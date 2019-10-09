<?php

namespace App\Http\Controllers\seguridad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function index(){
        return view('seguridad.login');
    }

    protected function authenticated(Request $request, $user){
        $roles = $user->roles()->where('estado', 1)->get();
        if($roles->isNotEmpty()){
             $user->setSession($roles->toArray());
        }else{
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('seguridad/logout')->withErrors(['Error' => 'Este usuario no tiene un rol activo']);
        }
    }   
    
   
}
