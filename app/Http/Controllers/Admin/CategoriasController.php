<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Categoria;
use App\Rol_Categoria;


class CategoriasController extends Controller
{
    public function consultar(){
      $datoscategorias = DB::table('categorias')->get();
      return view('admin.admin.ConsultarCategoria', compact('datoscategorias'));
    }
    public function interfaceagregar()
    {
      $datoscategoria = DB::table('categorias')->get();
      $datosroles = DB::table('rol')->where('clave_rol','!=','1')->get();
      //$datos = Producto::get();
      return view('admin.admin.AgregarCategoria', compact('datoscategoria','datosroles'));
    }
    
    public function agregarbd()
    {
      request()->validate([
        'nombre_categoria' => 'required',
        'categoria_padre' =>'required',
        'descripcion_categoria' =>'required',
        'imagen_categoria' =>'required|image',
      ]);

      
      if(request('estado_categoria')){
        $estado = 1;
      }else{
        $estado = 0;
      }
      request()->file('imagen_categoria')->store('public');

      $url = request()->file('imagen_categoria')->store('public');
      
      Categoria:: create([
        
        'nombre_c'=> request('nombre_categoria'),
        'tipo_categoria'=> request('categoria_padre'),
        'imagen_c'=> $url,
        'descripcion'=> request('descripcion_categoria'),
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
    public function interfacemodificar($id)
    {
      $datos = DB::table('categorias')->where('id_categoria','=',''.$id.'')->get();
      
     
      $nombre_c = "";
      $tipo_c = "";
      $imagen_c = "";
      $descripcion = "";
      $mostrado_c = "";
      foreach($datos as $item){
        $nombre_c = $item->nombre_c;
        $tipo_c = $item->tipo_categoria;
        $imagen_c = $item->imagen_c;
        $descripcion = $item->descripcion;
        $mostrado_c = $item->mostrado_c;
      }
      $roles = DB::table('roles_categorias')->where('id_categoria','=',$id)->get();
      
      $datoscategoria = DB::table('categorias')->get();
      $datosroles = DB::table('rol')->where('clave_rol','!=','1')->get();
      //$datos = Producto::get();
      return view('admin.admin.EditarCategoria', compact('datoscategoria','datosroles','nombre_c','tipo_c','imagen_c','descripcion','mostrado_c','roles'));
    }
    
    public function modificarbd()
    {
      request()->validate([
        'nombre_categoria' => 'required',
        'categoria_padre' =>'required',
        'descripcion_categoria' =>'required',
        'imagen_categoria' =>'required|image',
      ]);

      
      if(request('estado_categoria')){
        $estado = 1;
      }else{
        $estado = 0;
      }
      request()->file('imagen_categoria')->store('public');

      $url = request()->file('imagen_categoria')->store('public');
      
      Categoria:: create([
        
        'nombre_c'=> request('nombre_categoria'),
        'tipo_categoria'=> request('categoria_padre'),
        'imagen_c'=> $url,
        'descripcion'=> request('descripcion_categoria'),
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

