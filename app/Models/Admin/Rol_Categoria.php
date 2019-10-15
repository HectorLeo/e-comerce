<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Rol_Categoria extends Model
{
    protected $table = 'roles_categorias';   // si no funciona habilitar esto para crearla la conexion hacia a la tabla
    protected $fillable = ['id_categoria','clave_rol','activo'];
}
