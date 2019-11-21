<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UsuClienteController extends Controller
{
    
    public function contenido()
    {
      $cart = \Session::get('cart');
      $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','3'],['tipo_categoria','=','3']])->get();
      $datosPNuevos = DB::table('productos')->where([['estado','=','1'],['nuevo','=','1']])->get();
      $datosPOfertas = DB::table('productos')->where([['estado','=','1'],['oferta','=','1']])->get();
      $datosPExclusivo = DB::table('productos')->where([['estado','=','1'],['exclusivo','=','1']])->get();
      $datoscomentarios = DB::table('comentarios')->where([['estado','=','1']])->get();
      $datosdescuentos = DB::table('descuentos')->get();
      return view('tiendaCliente.homecliente', compact('cart','datosC','datosPNuevos','datosPOfertas','datosPExclusivo','datoscomentarios','datosdescuentos'));
    }

    public function tiendaC($id)
    {
      $cart = \Session::get('cart');
      $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','3'],['tipo_categoria','=','3']])->get();
      $datosCP= DB::table('categorias')->where([['id_categoria','=',''.$id.'']])->get();
    
      $datosCH= DB::table('categorias')->where([['tipo_categoria','=',''.$id.'']])->get();
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
      $datosP2= DB::table('categorias')->where([['id_categoria','=',''.$tipo_ch.''],['id_categoria','!=','3'],['tipo_categoria','=','3']])->get();
      $datosPr= DB::table('productos')->where([['id_categoria','=',''.$id.'']])->get();

      return view('tiendaCliente.tiendaClien', compact('cart','datosDes','datosC','datosCP','datosCH','datosPr','datosP2','nombre_ch','tipo_ch','imagen_ch','descripcion_ch'));
    }

    public function TiendaP($id)
    {
      $cart = \Session::get('cart');
      $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','3'],['tipo_categoria','=','3']])->get();
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
      $datosP3  = DB::table('productos')->where([['id_categoria','=',''.$categoria.''],['id_producto','!=',''.$id.'']])->get();
      return view('tiendaCliente.productos', compact('cart','datosDes','datosP3','datosP2','precioD','datosComen','datosclientes','datosC','prom','nombre','precioN','existencias','descripcion','resumen','marca','imagen','id'));
    }

    
}
