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
      $estado = $request->get('estado');
      
      $datosproductos = Producto::orderBY('id_producto', 'ASC')
      ->id($id)
      ->nombre($nombre)
      ->referencia($referencia)
      ->categoria($categoria)
      ->precio_ex($precio_ex)
      ->precio_in($precio_in)
      ->cantidad($cantidad)
      ->estado($estado)
      ->paginate(50);
      //$datoscategorias = DB::table('categorias')->get();

      return view('admin.admin.ConsultarOfertasDes', compact('datosproductos'));
    }

    public function interfaceagregar($id)
    {
      $datosproductos = DB::table('productos')->where('id_producto',''.$id.'')->get();
      
      $id_categoria = "";
      $id_marca = "";
      $nombre_p = "";
      $referencia = "";
      $precio_neto = "";
      $precio_iva = "";
      $resumen_producto = "";
      $descripcion_producto = "";
      $imagen_p = "";
      $existencias= "";
      $p_anchura = "";
      $p_altura = "";
      $p_profundidad = "";
      $p_peso = "";
      $plazo_entrega_p = "";
      $gasto_envio_p = "";
      $precio_mayoreo_p = "";
      $cantidad_minima = "";
      $cantidad_mayoreo = "";
      $mostrado_c = "";
      foreach($datosproductos as $item){
        $id_categoria = $item->id_categoria;
        $id_marca = $item->id_marca;
        $nombre_p= $item->nombre_p;
        $referencia = $item->referencia;
        $precio_neto = $item->precio_neto;
        $precio_iva = $item->precio_iva;
        $resumen_producto = $item->resumen_producto;
        $descripcion_producto = $item->descripcion_producto;
        $imagen_p = $item->imagen_p;
        $existencias = $item->existencias;
        $p_anchura = $item->p_anchura;
        $p_altura = $item->p_altura;
        $p_profundidad = $item->p_profundidad;
        $p_peso = $item->p_peso;
        $plazo_entrega_p = $item->plazo_entrega_p;
        $gasto_envio_p = $item->gasto_envio_p;
        $precio_mayoreo_p = $item->precio_mayoreo_p;
        $cantidad_minima = $item->cantidad_minima;
        $cantidad_mayoreo = $item->cantidad_mayoreo;
        $estado = $item->estado;
      }
      
      /*$roles = DB::table('roles_categorias')->whereColumn([
          ["id_categoria","=",(int)$id],
          ['activo',1]
        ])->get();*/
      $datosmarcas = DB::table('marcas')->get();
      $datostransporte = DB::table('transportistas')->where('estado_transporte','!=','0')->get();
      $acti_transporte = DB::select("select * from transporte_producto where (id_producto = $id and activo = 1)");
      //return $roles;
      $datoscategoria = DB::table('categorias')->get();
      
      //$datostransporte = DB::table('rol')->where('clave_rol','!=','1')->get();
      //return $roles ;
      //$datos = Producto::get();
      return view('admin.admin.AgregarOfertasDes', compact('datoscategoria','datosmarcas','datostransporte','id_categoria','id_marca',
      'nombre_p','referencia','precio_neto','precio_iva','resumen_producto','descripcion_producto','imagen_p','existencias',
      'p_anchura','p_altura','p_profundidad','p_peso','plazo_entrega_p','gasto_envio_p','precio_mayoreo_p',
      'cantidad_minima','cantidad_mayoreo','estado','acti_transporte','id'));
    }
    public function agregarbd($id)
    {
      /*request()->validate([
        'nombre_categoria' => 'required',
        'categoria_padre' =>'required',
        'descripcion_categoria' =>'required',
        'imagen_categoria' =>'required|image',
      ]);*/

      
      if(request("id_$id")){
        $estado = 1;
      }else{
        $estado = 0;
      }
      if(request("fecha_inicio")==""){
        $fecha_inicio = "00-00-0000";
      }else{
        $fecha_inicio = request("fecha_inicio");
      }
      if(request("hora_inicio")==""){
        $hora_inicio = "00:00";
      }else{
        $hora_inicio = request("hora_inicio");
      }
      if(request("fecha_fin")==""){
        $fecha_fin = "00-00-0000";
      }else{
        $fecha_fin = request("fecha_fin");
      }
      if(request("hora_fin")==""){
        $hora_fin = "00:00";
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
        'peso_d'=> $peso_d ,
        'fecha_inicio'=>  $fecha_inicio,
        'fecha_fin'=> $fecha_fin,
        'hora_inicio'=> $hora_inicio,
        'hora_fin'=> $hora_fin

      ]);
      
      DB::update("update productos set  oferta=$estado  where id_producto = $id"); 

      return redirect()->route('producto');
      //return view('admin.admin.AgregarProducto');
    }

}