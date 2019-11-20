<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Transportista extends Model
{
    protected $table = 'transportistas';   // si no funciona habilitar esto para crearla la conexion hacia a la tabla
    protected $fillable = ['envio_gratis','nombre_transporte','estado_transporte','logotipo_transporte','retraso_transporte','facturacion','impuestos','estado_impuesto','fuera_rango','r_mayorigual','r_menor','anchura','altura','profundidad','peso','precio_t'];

    public function scopeId($query, $id){
        if($id){
            return $query->where('id_transporte', 'LIKE', "%$id%");
        }

    }
    public function scopeNombre($query, $nombre){
        if($nombre){
            return $query->where('nombre_transporte', 'LIKE', "%$nombre%");
        }

    }
    public function scopeRetraso($query, $retraso){
        if($retraso){
            return $query->where('retraso_transporte', 'LIKE', "%$retraso%");
        }

    }
    public function scopeEstado($query, $estado){
            if($estado != null){
            return $query->where('estado_transporte', $estado);
        }

    }
    public function scopeEnvio($query, $envio){
        if($envio != null){
            return $query->where('envio_gratis', $envio);
        }

    }

}
