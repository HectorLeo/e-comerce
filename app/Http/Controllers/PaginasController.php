<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class ProductosController extends Controller
{
    
    public function contenido()
    {
      return view('admin.admin.contenido1');
    }
}
