<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ClienteController extends Controller
{
    
    public function index()
    {
      $cart = \Session::get('cart');
      $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
      $datosPNuevos = DB::table('productos')->where([['estado','=','1'],['nuevo','=','1']])->get();
      $datosPOfertas = DB::table('productos')->where([['estado','=','1'],['oferta','=','1']])->get();
      $datosPExclusivo = DB::table('productos')->where([['estado','=','1'],['exclusivo','=','1']])->get();
      $datoscomentarios = DB::table('comentarios')->where([['estado','=','1']])->get();
      $datosdescuentos = DB::table('descuentos')->get();
      $datosDes = DB::table('descuentos')->get();
      return view('tiendaCliente.homeCliente', compact('cart','datosDes','datosC','datosPNuevos','datosPOfertas','datosPExclusivo','datoscomentarios','datosdescuentos'));
        
    }
    
}
