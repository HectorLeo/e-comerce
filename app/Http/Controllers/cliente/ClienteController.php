<?php

namespace App\Http\Controllers\cliente;
use App\Http\Requests\ValidacionUsuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Seguridad\Usuario;
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
    public function cuenta()
    {
        $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
        $cart = \Session::get('cart');
        return view('tiendaCliente.cuenta',compact('cart','datosC'));
    }
    
    public function editarUsuario($email)
    {
      $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
      $cart = \Session::get('cart');
      $datosU = DB::table('usuarios')->where('email','=',''.$email.'')->get();
      $id="";
      $correo="";
      foreach($datosU as $item){
        $id=$item->id;
        $correo=$item->email;
      }
      $datos= DB::table('clientes')->where('usuario_id','=',''.$id.'')->get();
      $nombre = "";
      $apellidoP = "";
      $apellidoM = "";
      $telefono = "";
      foreach($datos as $item){
        $nombre = $item->nombre;
        $apellidoP = $item->a_paterno;
        $apellidoM = $item->a_materno;
        $telefono = $item->telefono;
      }
      return view('tiendaCliente.infousuario', compact('nombre','apellidoP','apellidoM','telefono','id','correo','cart','datosC'));
    }
    public function editar(ValidacionUsuario $request, $id)
    {
       return($id);
        $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
        $cart = \Session::get('cart');
        Usuario::findOrFail($id)->update(array_fileter($request->all()));

        return redirect('tiendaCliente.infousuario',compact('cart','datosC'));
    }
}
