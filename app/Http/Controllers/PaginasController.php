<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PaginasController extends Controller
{
    
    public function contenido()
    {
<<<<<<< HEAD
      $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','3'],['tipo_categoria','=','3']])->get();
=======
      $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','1']])->get();
>>>>>>> 0b7701430b90aa019f4e2c42b55ebabe03f2d489
      $datosP = DB::table('productos')->where([['estado','=','1']])->get();
      return view('tienda.home', compact('datosC','datosP'));
    }

    public function tiendaC($id)
    {
      $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','3'],['tipo_categoria','=','3']])->get();
      $datosCP= DB::table('categorias')->where([['id_categoria','=',''.$id.'']])->get();
    
      $datosCH= DB::table('categorias')->where([['tipo_categoria','=',''.$id.'']])->get();

      $nombre_ch = "";
      $tipo_ch = "";
      $imagen_ch = "";
      $descripcion_ch = "";
      foreach($datosCH as $item){
        $nombre_ch = $item->nombre_c;
        $tipo_ch = $item->tipo_categoria;
        $imagen_ch = $item->imagen_c;
        $descripcion_ch = $item->descripcion;
      }

      return view('tienda.tiendaC', compact('datosC','datosP','nombre_ch','tipo_ch','imagen_ch','descripcion_ch'));
    }
}
