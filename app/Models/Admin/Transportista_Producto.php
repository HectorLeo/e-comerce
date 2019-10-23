<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Transportista_Producto extends Model
{
    protected $table = 'transporte_producto';   // si no funciona habilitar esto para crearla la conexion hacia a la tabla
    protected $fillable = ['id_producto','id_transporte','activo'];
}