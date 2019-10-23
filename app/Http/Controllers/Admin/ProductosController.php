<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Producto;
use App\Models\Admin\Transportista_Producto;

class ProductosController extends Controller
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
      ->paginate(5);
      //$datoscategorias = DB::table('categorias')->get();

      return view('admin.admin.ConsultarProductos', compact('datosproductos'));
    }

    public function interfaceagregar()
    {
      $datos = DB::table('transportistas')->where('estado_transporte','!=','0')->get();
      $datoscategoria = DB::table('Categorias')->where('id_categoria','!=',1)->get();
      $datosmarcas = DB::table('marcas')->get();
      $datosinicio = DB::table('Categorias')->where('id_categoria','=',1)->get();
      //$datos = Producto::get();
      return view('admin.admin.AgregarProducto', compact('datos','datoscategoria','datosmarcas'));
      //$datos = Producto::get();
      //return view('admin.admin.AgregarProducto');
    }
    public function agregarbd()
    {
      /*request()->validate([
        'nombre_categoria' => 'required',
        'categoria_padre' =>'required',
        'descripcion_categoria' =>'required',
        'imagen_categoria' =>'required|image',
      ]);*/

      
      if(request('estado_product')){
        $estado = 1;
      }else{
        $estado = 0;
      }

      request()->file('imagen_producto')->store('public');

      $url = request()->file('imagen_producto')->store('public');
      
      Producto:: create([
        
        //'id_producto'=> request('nombre_categoria'),
        'id_categoria'=> request('categoria_padre'),
        'id_marca'=> request('marca'),
        'nombre_p'=> request('nombre_producto'),
        'referencia'=> request('referencia_producto'),
        'precio_neto'=> request('precio_sin_impuesto'),
        'precio_iva'=> request('precio_sin_impuesto'),
        'resumen_producto'=> request('resumen_producto'),
        'descripcion_producto'=> request('descripcion_producto'),
        'imagen_p'=> $url,
        'existencias'=> request('cantidad_existencia'),
        'p_anchura'=> request('anchura_producto'),
        'p_altura'=> request('altura_producto'),
        'p_profundidad'=> request('profundidad_producto'),
        'p_peso'=> request('peso_producto'),
        'plazo_entrega_p'=> request('plazo_entrega'),
        'gasto_envio_p'=> request('gastos_envio'),
        'precio_mayoreo_p'=> request('precio_mayoreo'),
        'cantidad_minima'=> request('cantidad_minima_venta'),
        'cantidad_mayoreo'=> request('cantidad_mayoreo'),
        'estado'=> $estado

      ]);
      $vector = array();
      $datos = DB::table('transportistas')->where('estado_transporte','!=','0')->get();
      //return $datos;
      foreach($datos as $item){
        if(request('id_'.$item->id_transporte.'')){
          $vector[] = $item->id_transporte;
          
        }
      }
      $idproducto = DB::table('productos')->where('referencia','=',request('referencia_producto'))->get('id_producto');
      $id="";
      foreach($idproducto as $item){
        $id=$item->id_producto;
      }
     // return $vector;
      foreach($vector as $item){
          Transportista_Producto:: create([
            //'clave_rol'=>"aa1",
            'id_producto'=> $id,
            'id_transporte'=> $item,
            'activo'=> 1
            
          ]);
        
      }
      
      return redirect()->route('producto');
      //return view('admin.admin.AgregarProducto');
    }

    public function interfaceeditar($id)
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
      return view('admin.admin.EditarProducto', compact('datoscategoria','datosmarcas','datostransporte','id_categoria','id_marca',
      'nombre_p','referencia','precio_neto','precio_iva','resumen_producto','descripcion_producto','imagen_p','existencias',
      'p_anchura','p_altura','p_profundidad','p_peso','plazo_entrega_p','gasto_envio_p','precio_mayoreo_p',
      'cantidad_minima','cantidad_mayoreo','estado','acti_transporte','id'));
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
      if(request('imagen_producto')==""){
        $url = request('imagen_actual');
      }else{
        $url = request()->file('imagen_producto')->store('public');
      }
      if(request('estado_product')){
        $estado = 1;
      }else{
        $estado = 0;
      }

      $id_categoria =  request('categoria_padre');
      $id_marca =   request('marca');
      $nombre_p = request('nombre_producto');
      $referencia = request('referencia_producto');
      $precio_neto = request('precio_sin_impuesto');
      $precio_iva = request('precio_sin_impuesto');
      $resumen_producto = request('resumen_producto');
      $descripcion_producto = request('descripcion_producto');
      $imagen_p = $url;
      $existencias = request('cantidad_existencia');
      $p_anchura = request('anchura_producto');
      $p_altura = request('altura_producto');
      $p_profundidad = request('profundidad_producto');
      $p_peso = request('peso_producto');
      $plazo_entrega_p = request('plazo_entrega');
      $gasto_envio_p = request('gastos_envio');
      $precio_mayoreo_p = request('precio_mayoreo');
      $cantidad_minima = request('cantidad_minima_venta');
      $cantidad_mayoreo = request('cantidad_mayoreo');
     
      //request()->file('imagen_categoria')->store('public');
      DB::update("update productos set id_categoria = $id_categoria, id_marca= $id_marca, nombre_p ='$nombre_p',
      referencia='$referencia', precio_neto=$precio_neto, precio_iva=$precio_iva, resumen_producto='$resumen_producto',
      descripcion_producto='$descripcion_producto', imagen_p='$imagen_p', existencias=$existencias, p_anchura=$p_anchura, 
      p_altura=$p_altura, p_profundidad=$p_profundidad ,p_peso=$p_peso ,plazo_entrega_p='$plazo_entrega_p' ,gasto_envio_p=$gasto_envio_p,
      precio_mayoreo_p=$precio_mayoreo_p, cantidad_minima=$cantidad_minima, cantidad_mayoreo=$cantidad_mayoreo,
      estado=$estado  where id_producto = $id"); 
      
      $datostransporte = DB::table('transportistas')->where('estado_transporte','!=','0')->get();
      
      foreach($datostransporte as $item){
          
            if(request('id'.$item->id_transporte.'')){
              DB::table('transporte_producto')->updateOrInsert(
                ['id_producto' => $id, 'id_transporte' => $item->id_transporte],
                ['activo' => '1']);
            }else{
              DB::table('transporte_producto')->updateOrInsert(
                ['id_producto' => $id, 'id_transporte' => $item->id_transporte],
                ['activo' => '0']);
              }
         
        
      }
      return redirect()->route('producto');
     
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
