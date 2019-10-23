<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Marcas;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as IlluminateRequest;

class Marcacontroller extends Controller
{
    public function consultar(Request $request){
        $id= $request->get('id');
        $nombre= $request->get('nombre');
        $estado= $request->get('estado');
        $datosmarcas = Marcas::orderBY('id_marca', 'DESC')
        ->id($id)
        ->nombre($nombre)
        ->estado($estado)
        ->paginate(4);
      //$datostransportes = DB::table('transportistas')->get();
      return view('admin.admin.ConsultarMarcas', compact('datosmarcas'));
    }
    public function interfaceagregar()
    {
      //$datosroles = DB::table('rol')->where('clave_rol','!=','1')->get();
      return view('admin.admin.AgregarMarca');
    }


    public function agregarbd()
    {
      request()->validate([
        'nombre_marca' => 'required',
        'descripcion_marca' =>'required',
        'imagen_marca' =>'required|image',
      ]);

      
      if(request('estado')){
        $estado = 1;
      }else{
        $estado = 0;
      }
      request()->file('imagen_marca')->store('public');

      $url = request()->file('imagen_marca')->store('public');
      
      Marcas:: create([
        
        'nombre_m'=> request('nombre_marca'),
        'logotipo_m'=> $url,
        'descripcion'=> request('descripcion_marca'),
        'activo_m'=> $estado
      ]);

      return redirect()->route('marcaC');
     
    }

    public function interfacemodificar($id)
    {
      $datos = DB::table('marcas')->where('id_marca','=',''.$id.'')->get();
      
     
      $nombre_m = "";
      $logotipo_m = "";
      $descripcion = "";
      $activo_m = "";
      foreach($datos as $item){
        $nombre_m = $item->nombre_m;
        $logotipo_m = $item->logotipo_m;
        $descripcion = $item->descripcion;
        $activo_m = $item->activo_m;
      }
      return view('admin.admin.EditarMarca', compact('nombre_m','logotipo_m','descripcion','activo_m','id'));
    }

    public function modificarbd($id)
    {
      request()->validate([
        'nombre_marca' => 'required',
        'descripcion_marca' =>'required',
        //'imagen_marca' =>'required|image',
      ]);

      //return request('imagen_categoria');
      if(request('imagen_marca')==""){
        $url = request('imagen_actual');
      }else{
        $url = request()->file('imagen_marca')->store('public');
      }
      if(request('estado')){
        $estado = 1;
      }else{
        $estado = 0;
      }
      $nombre_m=request('nombre_marca');
      $imagen_m = $url;
      $descripcion = request('descripcion_marca');
      $mostrado_m = $estado;
      //request()->file('imagen_categoria')->store('public');
      DB::update("update marcas set nombre_m = '$nombre_m', descripcion='$descripcion', activo_m= $mostrado_m , logotipo_m= '$imagen_m'   where id_marca = $id"); 
      
      return redirect()->route('marcaC');
     
    }

    public function eliminar(Request $request){
      $id = $request->id;
      $estado_marca=$request->val;
      DB::update("update marcas set activo_m = $estado_marca where id_marca = $id");
      
          $guardado="3";
          return response()->json(['guardado' => $guardado], 200);
     
    }
}
