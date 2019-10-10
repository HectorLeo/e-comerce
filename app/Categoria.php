<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //protected $table = 'categorias';   // si no funciona habilitar esto para crearla la conexion hacia a la tabla
    protected $fillable = ['clave_rol','nombre_c','tipo-categoria','imagen_c','decripcion','mostrado_c'];
}
