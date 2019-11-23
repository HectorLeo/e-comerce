<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';   // si no funciona habilitar esto para crearla la conexion hacia a la tabla
    protected $fillable = ['id_pedido','id_transporte','id_usuario','id_direccion','cantidad_ped'];

}
