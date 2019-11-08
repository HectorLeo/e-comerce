<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    protected $table = 'marcas';   // si no funciona habilitar esto para crearla la conexion hacia a la tabla
    protected $fillable = ['id_marca','nombre_m','logotipo_m','activo_m','descripcion'];

    public function scopeId($query, $id){
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

    }
    
}
