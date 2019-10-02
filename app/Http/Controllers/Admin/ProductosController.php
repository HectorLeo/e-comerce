<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    
    public function Agregar()
    {
      return view('admin.admin.AgregarProducto');
    }
}
