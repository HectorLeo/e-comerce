<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use  DB;
use Illuminate\Http\Request;

class Transportecontroller extends Controller
{
    public function interfaceagregar()
    {
      $datosroles = DB::table('rol')->where('clave_rol','!=','1')->get();
      return view('admin.admin.AgregarTransporte',compact('datosroles'));
    }


    public function agregarbd()
    {
      request()->validate([
        'nombre_transporte' => 'required',
        'retraso_transporte' =>'required',
        'imagen_logotipo' =>'required|image',
        'customRadio' =>'required',
        'lista_impuestos' =>'required',
        'rango_comportamiento' =>'required',

      ]);
        request()([
          'rango_mayor',
          'rango_menor',
          'anchura',
          'altura',
          'profundidad',
          'peso'
        ]);
      
      if(request('impuestos')){
        $impuestos = 1;
      }else{
        $impuestos = 0;
      }
      if(request('envio_g')){
        $envio_g = 1;
      }else{
        $envio_g = 0;
      }
      if(request('estado')){
        $estado = 1;
      }else{
        $estado = 0;
      }
      request()->file('imagen_logotipo')->store('public');

      $url = request()->file('imagen_logotipo')->store('public');
      
      Categoria:: create([
        
        'nombre_t'=> request('nombre_transporte'),
        'retraso'=> request('retraso_transporte'),
        'facturacion'=> request('custom_radio'),
        'lis_impuestos'=> request('lista_impuestos'),
        'rango'=> request('rango_comportamiento'),
        'mayor'=> request('rango_mayor'),
        'menor'=> request('rango_menor'),
        'anchura'=> request('anchura'),
        'altura'=> request('altura'),
        'profundidad'=> request('profundidad'),
        'peso'=> request('peso'),
        'logotipo'=> $url,
        'envio_gratis'=> $envio_g,
        'mostrado_c'=> $estado,
        //'mostrado_c'=> $estado
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
