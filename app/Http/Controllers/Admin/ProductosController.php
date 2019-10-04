<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use App\Producto;


class ProductosController extends Controller
{
    
    public function interfaceagregar()
    {
      $datos = DB::table('transportistas')->get();
      //$datos = Producto::get();
      return view('admin.admin.AgregarProducto', compact('datos'));
    }
    public function agregarbd()
    {
      $nombre = request('nombre_producto');
      $nombre = request('nombre_producto');
      $nombre = request('nombre_producto');
      $nombre = request('nombre_producto');
      $nombre = request('nombre_producto');
      $nombre = request('nombre_producto');
      $nombre = request('nombre_producto');
      $nombre = request('nombre_producto');




      return request('nombre_producto');
    }
}
