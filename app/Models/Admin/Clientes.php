<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';   // si no funciona habilitar esto para crearla la conexion hacia a la tabla
    protected $fillable = ['usuario_id','nombre','a_paterno','a_materno','telefono','rol_clave_rol','estado'];
}
