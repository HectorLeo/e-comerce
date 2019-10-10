<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use App\Categoria;
use App\Rol_Categoria;


class CategoriasController extends Controller
{
    
    public function interfaceagregar()
    {
      $datoscategoria = DB::table('categorias')->get();
      $datosroles = DB::table('rol')->where('clave_rol','!=','1')->get();
      //$datos = Producto::get();
      return view('admin.admin.AgregarCategoria', compact('datoscategoria','datosroles'));
    }
    public function agregarbd()
    {
      /*request()->validate([
        request('nombre_categoria') => 'required'
      ]);*/

      
      if(request('estado_categoria')){
        $estado = 1;
      }else{
        $estado = 0;
      }
      request()->file('imagen_categoria')->store('public');

      $url = request()->file('imagen_categoria')->store('public');
      
      Categoria:: create([
        
        'nombre_c'=> request('nombre_categoria'),
        'tipo-categoria'=> request('categoria_padre'),
        'imagen_c'=> $url,
        'decripcion'=> request('descripcion_categoria'),
        'mostrado_c'=> $estado
      ]);
      $vector = array();
      $datos = DB::table('rol')->where('clave_rol','!=','1')->get();
      //return $datos;
      foreach($datos as $item){
        if(request('id'.$item->rol.'')){
          $vector[] = $item->clave_rol;
          
        }
      }
      $idCategoria = DB::table('categorias')->where('nombre_c','=',request('nombre_categoria'))->get('id_categoria');
      $id="";
      foreach($idCategoria as $item){
        $id=$item->id_categoria;
      }
      //return $vector;
      foreach($vector as $item){
          Rol_Categoria:: create([
            //'clave_rol'=>"aa1",
            'id_categoria'=> $id,
            'clave_rol'=> $item
            
          ]);
        
      }
      return redirect()->route('categoria');
     
    }
}

