<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as IlluminateRequest;

class ComentariosController extends Controller
{
    public function consultar(Request $request){
      $id= $request->get('id');
      $nombre= $request->get('nombre');
      $referencia= $request->get('referencia');
      $calificacion= $request->get('calificacion');
      $estado= $request->get('estado');
      
      $datoscomentarios = Comentario::orderBY('id_comentarios', 'DESC')
      ->id($id)
      ->id($nombre)
      ->id($referencia)
      ->id($calificacion)
      ->id($estado)
      ->paginate(10);
      $datoscliente = DB::table('clientes')->where([['rol_clave_rol','=','2'],['estado','=','1']])->get();
      $datosproducto = DB::table('productos')->where('estado','=','1')->get();

      return view('admin.admin.ConsultarComentarios', compact('datoscomentarios','datoscliente','datosproducto'));
    }

    public function interfaceagregar()
    {
      $datoscategoria = DB::table('categorias')->get();
      
      $datosroles = DB::table('rol')->where('clave_rol','!=','1')->get();
      //$datos = Producto::get();
      return view('admin.admin.AgregarCategoria', compact('datoscategoria','datosroles'));
    }
    
    
    
    public function eliminar(Request $request){
        $id = $request->id;
        $estado=$request->val;
        DB::update("update comentarios set estado = $estado where id_comentarios = $id");
        if($estado == '1'){
          $guardado="activo";
        }else{
          $guardado="desactivo";
        }
        
        return response()->json(['guardado' => $guardado], 200);
       
      }
      public function insertar(Request $request){
        $correo = $request->correo;
        $comentario = $request->comentario;
        $id_producto = $request->id_producto;
        $datos = DB::table('usuarios')->where('email',''.$correo.'')->get();
        
        foreach($datos as $item){
          $id = $item->id;
        }
        $cont=$request->cont;
        Comentario:: create([
        
          'id_usuario'=> $id,
          'id_producto'=> $id_producto,
          'calificacion'=> $cont,
          'comentario'=> $comentario,
          'estado'=> 0
  
        ]);


        $guardado="activo";
        
        return response()->json(['guardado' => $id], 200);
       
      }
}

