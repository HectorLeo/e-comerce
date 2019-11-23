<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    protected $table = 'direcciones';   // si no funciona habilitar esto para crearla la conexion hacia a la tabla
    protected $fillable = ['id_direccion','calle','codigo_postal','localidad','ciudad','telefono','municipio','id_usuario','numero_exterior_d','numero_interior'];

}
