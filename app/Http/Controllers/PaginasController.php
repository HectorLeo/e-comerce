<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PaginasController extends Controller
{
    public function __construct()
    {
        if(!\Session::has ('cart')) \Session :: put('cart', array());
    }
    public function contenido()
    {
      $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
      $datosPNuevos = DB::table('productos')->where([['estado','=','1'],['nuevo','=','1']])->get();
      $datosPOfertas = DB::table('productos')->where([['estado','=','1'],['oferta','=','1']])->get();
      $datosPExclusivo = DB::table('productos')->where([['estado','=','1'],['exclusivo','=','1']])->get();
      $datosPtodos = DB::table('productos')->where('estado','=','1')->get();
      $datoscomentarios = DB::table('comentarios')->where([['estado','=','1']])->get();
      $datosdescuentos = DB::table('descuentos')->get();
      $cart = \Session::get('cart');
      return view('tienda.home', compact('datosC','cart','datosPNuevos','datosPtodos','datosPOfertas','datosPExclusivo','datoscomentarios','datosdescuentos'));
    }

    public function tiendaC($id)
    {
      $cart = \Session::get('cart');
      $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
      $datosCP= DB::table('categorias')->where([['id_categoria','=',''.$id.'']])->get();
    
      $datosCH= DB::table('categorias')->where([['tipo_categoria','=',''.$id.'']])->get();
      $datosDes = DB::table('descuentos')->get();
      $datoscomentarios = DB::table('comentarios')->where([['estado','=','1']])->get();
      $idCate_CH="";
      $nombre_ch = "";
      $tipo_ch = "";
      $imagen_ch = "";
      $descripcion_ch = "";
      foreach($datosCP as $item){
        $idCate_CH = $item->id_categoria;
        $nombre_ch = $item->nombre_c;
        $tipo_ch = $item->tipo_categoria;
        $imagen_ch = $item->imagen_c;
        $descripcion_ch = $item->descripcion;
      }
      $datosP2= DB::table('categorias')->where([['id_categoria','=',''.$tipo_ch.''],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
      $datosPr= DB::table('productos')->where([['id_categoria','=',''.$id.''],['estado','=','1']])->get();

      return view('tienda.tiendaC', compact('datoscomentarios','cart','datosDes','datosC','datosCP','datosCH','datosPr','datosP2','nombre_ch','tipo_ch','imagen_ch','descripcion_ch'));
    }

    public function TiendaP($id)
    {
      $cart = \Session::get('cart');
      $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
      $datosP = DB::table('productos')->where([['id_producto','=',''.$id.'']])->get();
      $datosComen = DB::table('comentarios')->where([['id_producto','=',''.$id.''],['estado','=','1']])->get();
      $datosDescuentos = DB::table('descuentos')->where([['id_producto','=',''.$id.'']])->get();
      $datosDes = DB::table('descuentos')->where([['id_producto','!=',''.$id.'']])->get();
      
      $precioD=0;
      $descuento="";
      if((count($datosDescuentos)) != 0){
      foreach($datosDescuentos as $item){
        if(($item->porcentaje_d)!= 0.00){
            $descuento = $item->peso_d;
        }
        else{
          $descuento = $item->porcentaje_d;
        }
        $precioD= $item->precio_descuento;
      }
      }
      $idP="";
      $nombre = "";
      $precioN = "";
      $existancias = "";
      $descripcion = "";
      $resumen ="";
      $marca = "";
      $imagen = "";
      $categoria ="";
      foreach($datosP as $item){
        $idP = $item->id_producto;
        $nombre = $item->nombre_p;
        $precioN = $item->precio_iva;
        $existencias = $item->existencias;
        $descripcion = $item->descripcion_producto;
        $resumen = $item->resumen_producto;
        $marca = $item->id_marca;
        $imagen =  $item->imagen_p;
        $categoria =  $item->id_categoria;
      }

      $idU="";
      $total=0;
      $comentario="";
      foreach($datosComen as $item){
        $idU= $item->id_usuario;
        $total=$total +($item->calificacion);
      }
      if((count($datosComen)) == 0){
        $promedio= 0;
        $prom=0;
      }
      else{
        $promedio= ($total/count($datosComen));
        $prom=round($promedio,1);
      }

      $datosclientes = DB::table('clientes')->get();
      $datosCat = DB::table('categorias')->where([['id_categoria','=',''.$categoria.''],['tipo_categoria','!=','1']])->get();
      if((count($datosCat))!=0){
        $tipo="";
        foreach($datosCat as $item){
          $tipo=$item->tipo_categoria;
        }
        $datosP2= DB::table('categorias')->where([['id_categoria','=',''.$tipo.''],['id_categoria','!=','1'],['tipo_categoria','=','1']])->orWhere([['id_categoria','=',''.$categoria.'']])->get();
      }else{
        $datosP2= DB::table('categorias')->where([['id_categoria','=',''.$categoria.''],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
      }
      $datosP3  = DB::table('productos')->where([['id_categoria','=',''.$categoria.''],['id_producto','!=',''.$id.''],['estado','=','1']])->get();
      $datoscomentarios = DB::table('comentarios')->where([['estado','=','1']])->get();
      return view('tienda.productos', compact('datosDescuentos','cart','datosDes','datosP3','datosP2','precioD','datosComen','datosclientes',
      'datosC','prom','nombre','precioN','existencias','descripcion','resumen','marca','imagen','id','datoscomentarios'));
    } 


    public function ventena_PopUp(Request $request){ 
      $id = $request->id;
      $datosP = DB::table('productos')->where([['id_producto','=',''.$id.'']])->get();
      
      $datosDescuentos = DB::table('descuentos')->where([['id_producto','=',''.$id.'']])->get();
      
      $precioD=0;
      $descuento="";
      if((count($datosDescuentos)) != 0){
        foreach($datosDescuentos as $item){
          if(($item->porcentaje_d)!= 0.00){
              $descuento = $item->peso_d;
              $precioD= $item->precio_descuento;
          }
          else{
            $descuento = $item->porcentaje_d;
            $precioD= $item->precio_descuento;
          }
          
        }
      }
      $nombre = "";
      $precioN = "";
      $resumen ="";
      $imagen = "";
      foreach($datosP as $item){
        $idP = $item->id_producto;
        $nombre = $item->nombre_p;
        $precioN = $item->precio_iva;
        $existencias = $item->existencias;
        $descripcion = $item->descripcion_producto;
        $resumen = $item->resumen_producto;
        $imagen =  $item->imagen_p;
      }
      $imagen2 = substr($imagen, 7);
      $imagen3 = '/storage/'.$imagen2; 

      return response()->json(['nombre' => $nombre,'precioD' => $precioD,
      'precioN' => $precioN,'existencias' => $existencias,'resumen' => $resumen,'imagen' => $imagen3], 200);
     
    }

    public function buscarProductos(){
      
      $buscar_p=request('buscar_producto');
      $datos_p = DB::table('productos')->where([['referencia','like','%'.$buscar_p.'%'],['estado','=','1']])->orWhere([['nombre_p','like','%'.$buscar_p.'%'],['estado','=','1']])->get();
      
      $datosPr = $datos_p;
      $cart = \Session::get('cart');
      $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
      $datosCP= DB::table('categorias')->where([['mostrado_c','=','1']])->get();
    
      $datosCH= DB::table('categorias')->where([['mostrado_c','=','1']])->get();
      $datosDes = DB::table('descuentos')->get();

      $idCate_CH="";
      $nombre_ch = "";
      $tipo_ch = "";
      $imagen_ch = "";
      $descripcion_ch = "";
      foreach($datosCP as $item){
        $idCate_CH = $item->id_categoria;
        $nombre_ch = $item->nombre_c;
        $tipo_ch = $item->tipo_categoria;
        $imagen_ch = $item->imagen_c;
        $descripcion_ch = $item->descripcion;
      }
      $datosP2= DB::table('categorias')->where([['id_categoria','=',''.$tipo_ch.''],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
      //$datosPr= DB::table('productos')->where([['id_categoria','=',''.$id.'']])->get();

      return  view('tienda.buscarProducto', compact('buscar_p','cart','datosDes','datosC','datosCP','datosCH','datosPr','datosP2','nombre_ch','tipo_ch','imagen_ch','descripcion_ch'));
    }

}
