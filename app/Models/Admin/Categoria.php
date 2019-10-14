<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //protected $table = 'categorias';   // si no funciona habilitar esto para crearla la conexion hacia a la tabla
    protected $fillable = ['nombre_c','tipo_categoria','imagen_c','descripcion','mostrado_c'];
}
