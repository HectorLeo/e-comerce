<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Imagenes_Producto extends Model
{
    protected $table = 'imagenes_producto';   // si no funciona habilitar esto para crearla la conexion hacia a la tabla
    protected $fillable = ['id_producto','url'];
    
}
