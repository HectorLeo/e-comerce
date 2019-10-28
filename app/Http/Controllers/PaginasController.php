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
      $datosP = DB::table('productos')->where([['estado','=','1']])->get();
      
     
      /*$nombre_c = "";
      $tipo_c = "";
      $imagen_c = "";
      $descripcion = "";
      foreach($datosC as $item){
        $nombre_c = $item->nombre_c;
        $tipo_c = $item->tipo_categoria;
        $imagen_c = $item->imagen_c;
        $descripcion = $item->descripcion;
      }*/
      return view('tienda.home', compact('datosC', 'datosP'));
    }
}
