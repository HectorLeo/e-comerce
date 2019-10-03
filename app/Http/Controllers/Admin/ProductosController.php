<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;


class ProductosController extends Controller
{
    
    public function interfaceagregar()
    {
      $datos = DB::table('transportistas')->get();
      return view('admin.admin.AgregarProducto', compact('datos'));
    }
    public function agregarbd()
    {
      
      return request('nombre_producto');
    }
}
