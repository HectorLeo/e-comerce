<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Transporte_Rol extends Model
{
    
    protected $table = 'transporte_rol';   // si no funciona habilitar esto para crearla la conexion hacia a la tabla
    protected $fillable = ['id_transporte','clave_rol'];
}
