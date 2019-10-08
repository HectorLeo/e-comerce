<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    
    public function interfaceagregar()
    {
      
      //$datos = Producto::get();
      return view('admin.admin.AgregarProducto');
    }
    public function agregar()
    {
      return view('admin.admin.AgregarProducto');
    }
}
