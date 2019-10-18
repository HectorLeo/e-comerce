<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Categoria;
use App\Models\Admin\Rol_Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as IlluminateRequest;

class CategoriasController extends Controller
{
    public function consultar(Request $request){
      $id= $request->get('id');
      $nombre= $request->get('nombre');
      $estado= $request->get('estado');
      
      $datoscategorias = Categoria::orderBY('id_categoria', 'ASC')
      ->id($id)
      ->nombre($nombre)
      ->estado($estado)
      ->paginate(3);
      //$datoscategorias = DB::table('categorias')->get();

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
            'clave_rol'=> $item,
            'activo'=> 1
            
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
      
      /*$roles = DB::table('roles_categorias')->whereColumn([
          ["id_categoria","=",(int)$id],
          ['activo',1]
        ])->get();*/
      $roles = DB::select("select * from roles_categorias where (id_categoria = $id and activo = 1)");
      //return $roles;
      $datoscategoria = DB::table('categorias')->get();
      
      $datosroles = DB::table('rol')->where('clave_rol','!=','1')->get();
      //return $roles ;
      //$datos = Producto::get();
      return view('admin.admin.EditarCategoria', compact('datoscategoria','datosroles','nombre_c','tipo_c','imagen_c','descripcion','mostrado_c','roles','id'));
    }
    
    public function modificarbd($id)
    {
      request()->validate([
        'nombre_categoria' => 'required',
        'categoria_padre' =>'required',
        'descripcion_categoria' =>'required',
        'imagen_categoria' =>'image',
      ]);

      //return request('imagen_categoria');
      if(request('imagen_categoria')==""){
        $url = request('imagen_actual');
      }else{
        $url = request()->file('imagen_categoria')->store('public');
      }
      if(request('estado_categoria')){
        $estado = 1;
      }else{
        $estado = 0;
      }
      $nombre_c=request('nombre_categoria');
      $tipo_c = request('categoria_padre');
      $imagen_c = $url;
      $descripcion = request('descripcion_categoria');
      $mostrado_c = $estado;
      //request()->file('imagen_categoria')->store('public');
      DB::update("update categorias set nombre_c = '$nombre_c', tipo_categoria = '$tipo_c', imagen_c ='$imagen_c', descripcion='$descripcion', mostrado_c=$mostrado_c   where id_categoria = $id"); 
      /*$id->update([
        'nombre_c'=> request('nombre_categoria'),
        'tipo_categoria'=> request('categoria_padre'),
        'imagen_c'=> $url,
        'descripcion'=> request('descripcion_categoria'),
        'mostrado_c'=> $estado
      ]);*/

      /*$categoriaAc = DB::table('categorias')->where('id_categoria','=',''.$id.'')->get();
      
      $categoriaAc->nombre_c = request('nombre_categoria');
      $categoriaAc->tipo_categoria = request('categoria_padre');
      $categoriaAc->imagen_c = request('nombre_categoria');
      $categoriaAc->nombre_c = request('nombre_categoria');
      $categoriaAc->nombre_c = request('nombre_categoria');
      $categoriaAc->save();*/
      //$id_categoria=$id;
      //$rocat=Rol_Categoria::findOrFail($id_categoria);
      //Rol_Categoria::destroy($id);
      //$rocat->delete();

      
      $datos = DB::table('rol')->where('clave_rol','!=','1')->get();
     
      
      $idCategoria = DB::table('categorias')->where('nombre_c','=',request('nombre_categoria'))->get('id_categoria');
      $idrol="";
      foreach($idCategoria as $item){
        $idrol=$item->id_categoria;
      }
      
      foreach($datos as $item){
          
            if(request('id'.$item->rol.'')){
              DB::table('roles_categorias')->updateOrInsert(
                ['id_categoria' => $id, 'clave_rol' => $item->clave_rol],
                ['activo' => '1']);
            }else{
              DB::table('roles_categorias')->updateOrInsert(
                ['id_categoria' => $id, 'clave_rol' => $item->clave_rol],
                ['activo' => '0']);
              }
         
        
      }
      return redirect()->route('categoria');
     
    }
    public function eliminar(Request $request){
      //$id = $request;
      $id = $request->id;
      $c_padre = DB::table('categorias')->where('tipo_categoria','=',$id)->get();
      if(!$c_padre->isEmpty()){//checo si esta vacia la consulta
        $guardado="1";
        return response()->json(['guardado' => $guardado], 200);
      }else{
        $c_producto = DB::table('productos')->where('id_categoria','=',$id)->get();
        if(!$c_producto->isEmpty()){//checo si esta vacia la consulta
          $guardado="2";
          return response()->json(['guardado' => $guardado], 200);
        }else{
           DB::delete("delete from roles_categorias where id_categoria = $id");
           DB::delete("delete from categorias where id_categoria = $id");
          //$eliminar = DB::table('categorias')->delete('id_categoria',$id)->where('id_categoria',$id)->get();
          //$eliminar = DB::table('categorias')->where('id_categoria','=',$id)->get();
          //$eliminar->delete($id);
          //Categoria::destroy($id);
          //$c_padre = DB::table('productos')->where('id_categoria','=',$id)->get();
          $guardado="3";
          return response()->json(['guardado' => $guardado], 200);
        }
        
      }


     
    }
}

