<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Transporte_Rol;
use App\Models\Admin\Transportista;
use  DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as IlluminateRequest;

class Transportecontroller extends Controller
{ 
  public function consultar(Request $request){
    $id= $request->get('id');
    $nombre= $request->get('nombre');
    $retraso= $request->get('retraso');
    $estado= $request->get('estado');
    $envio= $request->get('envio');
    $datostransportes = Transportista::orderBY('id_transporte', 'DESC')
    ->id($id)
    ->nombre($nombre)
    ->retraso($retraso)
    ->estado($estado)
    ->envio($envio)
    ->paginate(4);
  //$datostransportes = DB::table('transportistas')->get();
  return view('admin.admin.ConsultarTransporte', compact('datostransportes'));
}

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
      
      Transportista:: create([
        
        'nombre_transporte'=> request('nombre_transporte'),
        'retraso_transporte'=> request('retraso_transporte'),
        'facturacion'=> request('customRadio'),
        'impuestos'=> request('lista_impuestos'),
        'fuera_rango'=> request('rango_comportamiento'),
        'r_mayorigual'=> request('rango_mayor'),
        'r_menor'=> request('rango_menor'),
        'anchura'=> request('anchura'),
        'altura'=> request('altura'),
        'profundidad'=> request('profundidad'),
        'peso'=> request('peso_max'),
        'logotipo_transporte'=> $url,
        'envio_gratis'=> $envio_g,
        'estado_transporte'=> $estado,
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
      $idTransporte = DB::table('transportistas')->where('nombre_transporte','=',request('nombre_transporte'))->get('id_transporte');
      $id="";
      foreach($idTransporte as $item){
        $id=$item->id_transporte;
      }
      //return $vector;
      foreach($vector as $item){
          Transporte_Rol:: create([
            //'clave_rol'=>"aa1",
            'id_transporte'=> $id,
            'clave_rol'=> $item
            
          ]);
        
      }
      return redirect()->route('transporte');
     
    }
}
