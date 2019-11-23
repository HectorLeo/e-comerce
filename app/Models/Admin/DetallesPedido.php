<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class DetallesPedido extends Model
{
    protected $table = 'det_pedidos';   // si no funciona habilitar esto para crearla la conexion hacia a la tabla
    protected $fillable = ['id_det_pedido','id_pedido','id_producto','cantidad_detp'];

}
