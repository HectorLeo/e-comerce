<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    
    public function interfaceagregar()
    {
      $datos = DB::table('transportistas')->get();
      //$datos = Producto::get();
      return view('admin.admin.AgregarProducto', compact('datos'));
      //$datos = Producto::get();
      //return view('admin.admin.AgregarProducto');
    }
    public function agregar()
    {
      return view('admin.admin.AgregarProducto');
    }
}
