<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use App\Categoria;


class CategoriasController extends Controller
{
    
    public function interfaceagregar()
    {
      $datoscategoria = DB::table('categorias')->get();
      $datosroles = DB::table('rol')->where('clave_rol','!=','aa1')->get();
      //$datos = Producto::get();
      return view('admin.admin.AgregarCategoria', compact('datoscategoria','datosroles'));
    }
    public function agregarbd()
    {
      Categoria:: create([
        'clave_rol'=> request('aa1'),
        'nombre_c'=> request('nombre_categoria'),
        'tipo-categoria'=> request('categoria_padre'),
        'imagen_c'=> request(''),
        'decripcion'=> request('descripcion_categoria'),
        'mostrado_c'=> request('')
      ]);




      return request('nombre_producto');
    }
}

