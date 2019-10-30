<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Producto;
use App\Models\Admin\Descuento;

class OfertasDescuentosController extends Controller
{
    public function consultar(Request $request){
      $id = $request->get('id');
      $nombre = $request->get('nombre');
      $referencia =$request->get('referencia');
      $categoria =$request->get('categoria');
      $precio_ex =$request->get('precio_ex');
      $precio_in =$request->get('precio_in');
      $cantidad =$request->get('cantidad');
      $oferta = $request->get('oferta');
      
      $datosproductos = Producto::orderBY('id_producto', 'ASC')
      ->where('estado','1')
      ->id($id)
      ->nombre($nombre)
      ->referencia($referencia)
      ->categoria($categoria)
      ->precio_ex($precio_ex)
      ->precio_in($precio_in)
      ->cantidad($cantidad)
      ->oferta($oferta)
      ->paginate(50);
      //$datoscategorias = DB::table('categorias')->get();
      
      return view('admin.admin.ConsultarOfertasDes', compact('datosproductos'));
    }

    public function interfaceagregar($id)
    {
      $datosproductos = DB::table('productos')->where('id_producto',''.$id.'')->get();
      
      $id_categoria = "";
      $nombre_p = "";
      $referencia = "";
      $precio_neto = "";
      $precio_iva = "";
      $imagen_p = "";
      $existencias= "";
      $resumen_producto = "";

      foreach($datosproductos as $item){
        $id_categoria = $item->id_categoria;
        $nombre_p= $item->nombre_p;
        $referencia = $item->referencia;
        $precio_neto = $item->precio_neto;
        $precio_iva = $item->precio_iva;
        $imagen_p = $item->imagen_p;
        $existencias = $item->existencias;
        $resumen_producto = $item->resumen_producto;
        $oferta = $item->oferta;
      }
      
      //return $roles;
      $datoscategoria = DB::table('categorias')->get();
      
      //$datostransporte = DB::table('rol')->where('clave_rol','!=','1')->get();
      //return $roles ;
      //$datos = Producto::get();
      return view('admin.admin.AgregarOfertasDes', compact('datoscategoria','id_categoria',
      'nombre_p','referencia','resumen_producto','precio_neto','precio_iva','imagen_p','existencias','oferta','id'));
    }
    public function agregarbd($id)
    {
      /*request()->validate([
        'nombre_categoria' => 'required',
        'categoria_padre' =>'required',
        'descripcion_categoria' =>'required',
        'imagen_categoria' =>'required|image',
      ]);*/

      
      if(request("p_exclu$id")){
        $exclusivo = 1;
      }else{
        $exclusivo = 0;
      }
      if(request("ofe_nue")==0){
        $oferta = 1;
        $nuevo = 0;
      }else{
        $oferta = 0;
        $nuevo = 1;
      }
      if(request("fecha_inicio")==""){
        $fecha_inicio = "0000-00-00";
      }else{
        $fecha_inicio = request("fecha_inicio");
      }
      if(request("hora_inicio")==""){
        $hora_inicio = "00:00:00";
      }else{
        $hora_inicio = request("hora_inicio");
      }
      if(request("fecha_fin")==""){
        $fecha_fin = "0000-00-00";
      }else{
        $fecha_fin = request("fecha_fin");
      }
      if(request("hora_fin")==""){
        $hora_fin = "00:00:00";
      }else{
        $hora_fin = request("hora_fin");
      }
      if(request("porcentaje_d")==""){
        $porcentaje_d = "0.0";
      }else{
        $porcentaje_d = request("porcentaje_d");
      }
      if(request("peso_d")==""){
        $peso_d = "0.00";
      }else{
        $peso_d = request("peso_d");
      }
      
      
      Descuento:: create([
        'id_producto'=> $id,
        'porcentaje_d'=> $porcentaje_d,
        'peso_d'=> $peso_d,
        'fecha_inicio'=> $fecha_inicio,
        'fecha_fin'=> $fecha_fin,
        'hora_inicio'=> $hora_inicio,
        'hora_fin'=> $hora_fin

      ]);
      
      DB::update("update productos set  oferta=$oferta ,exclusivo=$exclusivo, nuevo=$nuevo where id_producto = $id"); 

      return redirect()->route('ofertaDescuento');
      //return view('admin.admin.AgregarProducto');
    }
    public function interfacemodificar($id)
    {
      $datosproductos = DB::table('productos')->where('id_producto',''.$id.'')->get();
      
      $id_categoria = "";
      $nombre_p = "";
      $referencia = "";
      $precio_neto = "";
      $precio_iva = "";
      $imagen_p = "";
      $existencias= "";
      $resumen_producto = "";

      foreach($datosproductos as $item){
        $id_categoria = $item->id_categoria;
        $nombre_p= $item->nombre_p;
        $referencia = $item->referencia;
        $precio_neto = $item->precio_neto;
        $precio_iva = $item->precio_iva;
        $imagen_p = $item->imagen_p;
        $existencias = $item->existencias;
        $resumen_producto = $item->resumen_producto;
        $oferta = $item->oferta;
        $nuevo = $item->nuevo;
        $exclusivo = $item->exclusivo;
      }

      $datosdescuento = DB::table('descuentos')->where('id_producto',''.$id.'')->get();
      $id_descuentos = "";
      $id_producto= "";
      $porcentaje_d = "";
      $peso_d = "";
      $fecha_inicio = "";
      $fecha_fin = "";
      $hora_inicio = "";
      $hora_fin = "";

      foreach($datosdescuento as $item){
        $id_descuentos = $item->id_descuentos;
        $id_producto= $item->id_producto;
        $porcentaje_d = $item->porcentaje_d;
        $peso_d = $item->peso_d;
        $fecha_inicio = $item->fecha_inicio;
        $fecha_fin = $item->fecha_fin;
        $hora_inicio = $item->hora_inicio;
        $hora_fin = $item->hora_fin;
      }
      //return $roles;
      $datoscategoria = DB::table('categorias')->get();
      
      //$datostransporte = DB::table('rol')->where('clave_rol','!=','1')->get();
      //return $roles ;
      //$datos = Producto::get();
      return view('admin.admin.EditarOfertasDes', compact('datoscategoria','id_categoria',
      'nombre_p','referencia','resumen_producto','precio_neto','precio_iva','imagen_p','existencias','oferta','nuevo','exclusivo','id',
      'id_descuentos','id_producto','porcentaje_d','peso_d','fecha_inicio','fecha_fin','hora_inicio','hora_fin'));
    }
    
    public function editarbd($id)
    {
     /* request()->validate([
        'nombre_categoria' => 'required',
        'categoria_padre' =>'required',
        'descripcion_categoria' =>'required',
        'imagen_categoria' =>'image',
      ]);*/

      //return request('imagen_categoria');
      
      if(request("p_exclu$id")){
        $exclusivo = 1;
      }else{
        $exclusivo = 0;
      }
      if(request("ofe_nue")==0){
        $oferta = 1;
        $nuevo = 0;
      }else{
        $oferta = 0;
        $nuevo = 1;
      }
      if(request("fecha_inicio")==""){
        $fecha_inicio = "0000-00-00";
      }else{
        $fecha_inicio = request("fecha_inicio");
      }
      if(request("hora_inicio")==""){
        $hora_inicio = "00:00:00";
      }else{
        $hora_inicio = request("hora_inicio");
      }
      if(request("fecha_fin")==""){
        $fecha_fin = "0000-00-00";
      }else{
        $fecha_fin = request("fecha_fin");
      }
      if(request("hora_fin")==""){
        $hora_fin = "00:00:00";
      }else{
        $hora_fin = request("hora_fin");
      }
      if(request("porcentaje_d")==""){
        $porcentaje_d = "0.0";
      }else{
        $porcentaje_d = request("porcentaje_d");
      }
      if(request("peso_d")==""){
        $peso_d = "0.00";
      }else{
        $peso_d = request("peso_d");
      }
     
      //request()->file('imagen_categoria')->store('public');
      DB::update("update productos set oferta=$oferta ,exclusivo=$exclusivo, nuevo=$nuevo where id_producto = $id"); 
      DB::update("update descuentos set fecha_inicio='$fecha_inicio', hora_inicio='$hora_inicio', fecha_fin='$fecha_fin',
       hora_fin='$hora_fin', porcentaje_d=$porcentaje_d, peso_d=$peso_d   where id_producto = $id"); 
      
      
      return redirect()->route('ofertaDescuento');
     
    }
    public function eliminar(Request $request){
      $id = $request->id;
      
      DB::update("update productos set oferta = 0 , exclusivo=0 ,nuevo=0 where id_producto = $id");
      DB::delete("delete from  descuentos where id_producto =  $id");
      $guardado="eliminado";
      
      return response()->json(['guardado' => $guardado], 200);
     
    }

}