<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table = 'descuentos';   // si no funciona habilitar esto para crearla la conexion hacia a la tabla
    protected $fillable = ['id_producto','porcentaje_d','peso_d','fecha_inicio','fecha_fin','hora_inicio','hora_fin'];

    /*public function scopeId($query, $id){
        if($id){
            return $query->where('id_marca', 'LIKE', "%$id%");
        }

    }
    public function scopeNombre($query, $nombre){
        if($nombre){
            return $query->where('nombre_m', 'LIKE', "%$nombre%");
        }

    }
    public function scopeEstado($query, $estado){
            if($estado != null){
            return $query->where('activo_m', $estado);
        }

    }*/
    
}
