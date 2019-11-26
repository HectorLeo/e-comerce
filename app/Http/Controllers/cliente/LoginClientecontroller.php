<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;

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
        $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
        return view('tienda.login-tienda',compact('cart','datosC'));
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
