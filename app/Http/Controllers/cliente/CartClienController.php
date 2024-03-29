<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Producto;
use DB;

class CartClienController extends Controller
{
    public function __construct()
    {
        if(!\Session::has ('cart')) \Session :: put('cart', array());
    }
    //show cart
    public function show(){
         $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
        $cart = \Session::get('cart');
        return view('tiendaCliente.carritoClien', compact('cart','datosC'));
    }
 
    //add item
    public function add(Producto $producto){
         $existencias =  request('existencias');
         if($existencias==""){
             $existencias=1;
         }
         $cart = \Session:: get('cart');
         $producto->quantity = $existencias;
         $cart[ $producto->nombre_p] = $producto;
         \Session::put('cart', $cart);
 
         return redirect()->route('carritoC');
    }
 
    // Delete item
    public function delete(Producto $producto){
        $cart = \Session:: get('cart');
        unset($cart[$producto->nombre_p]);
        \Session::put('cart', $cart);
        return redirect()->route('carritoC');
    }
 
    //update
    public function updates(Producto $producto, $quantity){
     $cart = \Session:: get('cart');
     $cart[$producto->nombre_p]->$quantity= $quantity;
     \Session::put('cart', $cart);
 
     return redirect()->route('carritoC');
    }
    public function updateC(Request $request){
     $cart = \Session:: get('cart');   
     $id = $request->id;
        $precio=$request->pre;
        $nombre=$request->nom;
        $valor=$request->val;
        $producto =Producto::where('nombre_p',$nombre)->first();
     $producto->quantity = $valor;
     $cart[$producto->nombre_p]->quantity = $valor;
     \Session::put('cart', $cart);
 
     return response()->json(['guardado' => $valor], 200);
    }
 
    //caja
    public function caja(){
         $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
         $cart = \Session::get('cart');
         $transportes=DB::table('transportistas')->where([['estado_transporte','=','1']])->get();
         return view('tiendaCliente.caja', compact('cart','datosC','transportes'));
    }

    public function terminos()
    {
        $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
        $cart = \Session::get('cart');
        return view('tiendaCliente.terminosCondiciones', compact('cart','datosC'));
    }
}
