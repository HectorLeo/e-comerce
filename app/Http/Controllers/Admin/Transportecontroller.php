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
        'estado_impueto' => $impuestos,
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
            'clave_rol'=> $item,
            'activo'=> '1'
          ]);
        
      }
      return redirect()->route('transporte');
     
    }

    public function interfacemodificar($id)
    {
      $datos = DB::table('transportistas')->where('id_transporte','=',''.$id.'')->get();
      
     
      $nombre_t = "";
      $envio = "";
      $estado_t = "";
      $logotipo = "";
      $retraso = "";
      $facturacion = "";
      $impuestos = "";
      $frango = "";
      $rmayor = "";
      $rmenor = "";
      $anchura = "";
      $altura = "";
      $profundidad = "";
      $peso = "";
      $estado_im="";
      foreach($datos as $item){
        $nombre_t = $item->nombre_transporte;
        $envio =  $item->envio_gratis;
        $estado_t =  $item->estado_transporte;
        $logotipo =  $item->logotipo_transporte;
        $retraso =  $item->retraso_transporte;
        $facturacion =  $item->facturacion;
        $impuestos =  $item->impuestos;
        $frango =  $item->fuera_rango;
        $rmayor =  $item->r_mayorigual;
        $rmenor =  $item->r_menor;
        $anchura =  $item->anchura;
        $altura =  $item->altura;
        $profundidad =  $item->profundidad;
        $peso =  $item->peso;
        $estado_im = $item->estado_impuesto;
      }
      
      $roles = DB::select("select * from transporte_rol where (id_transporte = $id and activo = 1)");
      //return $roles;
      //$datostransportistas = DB::table('transportistas')->get();
      
      $datosroles = DB::table('rol')->where('clave_rol','!=','1')->get();
      //return $roles ;
      //$datos = Producto::get();
      return view('admin.admin.EditarTransporte', compact('datosroles','nombre_t','envio','estado_t','logotipo','retraso','facturacion',
      'impuestos','frango','rmayor','rmenor','anchura','altura','profundidad','peso','id','estado_im','roles'));
    }

    public function modificarbd($id)
    {

      //return request('imagen_categoria');
      if(request('imagen_logotipo')==""){
        $url = request('imagen_actual');
      }else{
        $url = request()->file('imagen_logotipo')->store('public');
      }

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
        $nombre_transporte = request('nombre_transporte');
        $retraso_transporte = request('retraso_transporte');
        $facturacion = request('customRadio');
        $estado_impuesto = $impuestos;
        $impuestos = request('lista_impuestos');
        $fuera_rango =  request('rango_comportamiento');
        $r_mayorigual = request('rango_mayor');
        $r_menor = request('rango_menor');
        $anchura = request('anchura');
        $altura = request('altura');
        $profundidad = request('profundidad');
        $peso = request('peso_max');
        $logotipo_transporte = $url;
        $envio_gratis = $envio_g;
        $estado_transporte=$estado;
      //request()->file('imagen_categoria')->store('public');
      DB::update("update transportistas set nombre_transporte = '$nombre_transporte', retraso_transporte = '$retraso_transporte',
       facturacion =$facturacion, estado_impuesto=$estado_impuesto, impuestos=$impuestos  , fuera_rango=$fuera_rango
       , r_mayorigual=$r_mayorigual, r_menor=$r_menor, anchura=$anchura, altura=$altura, profundidad=$profundidad
       , peso=$peso, logotipo_transporte='$logotipo_transporte', envio_gratis=$envio_gratis, estado_transporte=$estado_transporte
       where id_transporte = $id"); 
      $datos = DB::table('rol')->where('clave_rol','!=','1')->get();
     
      
      $idTransporte = DB::table('transportistas')->where('nombre_transporte','=',request('nombre_transporte'))->get('id_transporte');
      $idrol="";
      foreach($idTransporte as $item){
        $idrol=$item->id_transporte;
      }
      
      foreach($datos as $item){
          
            if(request('id'.$item->rol.'')){
              DB::table('transporte_rol')->updateOrInsert(
                ['id_transporte' => $id, 'clave_rol' => $item->clave_rol],
                ['activo' => '1']);
            }else{
              DB::table('transporte_rol')->updateOrInsert(
                ['id_transporte' => $id, 'clave_rol' => $item->clave_rol],
                ['activo' => '0']);
              }
         
        
      }
      return redirect()->route('transporteC');
     
    }

    
}
