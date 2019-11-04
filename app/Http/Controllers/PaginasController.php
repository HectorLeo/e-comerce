<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PaginasController extends Controller
{
    
    public function contenido()
    {
      $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','3']])->get();
      $datosP = DB::table('productos')->where([['estado','=','1'],['nuevo','=','1']])->get();
      $datoscomentarios = DB::table('comentarios')->where([['estado','=','1']])->get();
      return view('tienda.home', compact('datosC','datosP','datoscomentarios'));
    }

    public function tiendaC($id)
    {
      $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','3'],['tipo_categoria','=','3']])->get();
      $datosCP= DB::table('categorias')->where([['id_categoria','=',''.$id.'']])->get();
    
      $datosCH= DB::table('categorias')->where([['tipo_categoria','=',''.$id.'']])->get();

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

      return view('tienda.tiendaC', compact('datosC','datosCP','datosCH','datosPr','datosP2','nombre_ch','tipo_ch','imagen_ch','descripcion_ch'));
    }

    public function tiendaP($id)
    {
      $datosP = DB::table('productos')->where([['id_producto','=',''.$id.'']])->get();

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
        $precioN = $item->precio_neto;
        $existencias = $item->existencias;
        $descripcion = $item->descripcion_producto;
        $resumen = $item->resumen_producto;
        $marca = $item->id_marca;
        $imagen =  $item->imagen;
        $categoria =  $item->id_categoria;
      }

      return view('tienda.home', compact('nombre','precionN','existencias','descripcion','resumen','marca','imagen'));
    }
}
