<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //protected $table = 'categorias';   // si no funciona habilitar esto para crearla la conexion hacia a la tabla
    protected $fillable = ['nombre_c','tipo_categoria','imagen_c','descripcion','mostrado_c'];
    
    public function scopeId($query, $id){
        if($id){
            return $query->where('id_comentarios', 'LIKE', "%$id%");
        }

    }
    public function scopeNombre($query, $nombre){
        if($nombre){
            return $query->where('nombre_c', 'LIKE', "%$nombre%");
        }

    }
    public function scopeEstado($query, $estado){
        if($estado != null){
            return $query->where('mostrado_c', $estado);
            //return Categoria::whereIn('mostrado_c', [$estado])->get();
        }

    } 

}
