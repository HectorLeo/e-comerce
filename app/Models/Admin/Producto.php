<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //protected $table = 'productos';   // si no funciona habilitar esto para crearla la conexion hacia a la tabla
    protected $fillable = ['id_categoria','id_marca','nombre_p','referencia','precio_neto','precio_iva','resumen_producto','descripcion_producto','imagen_p','existencias','p_anchura','p_altura','p_profundidad','p_peso','plazo_entrega_p','gasto_envio_p','precio_mayoreo_p','cantidad_minima','cantidad_mayoreo','estado','oferta','nuevo','exclusivo'];
    
    public function scopeId($query, $id){
        if($id){
            return $query->where('id_producto', 'LIKE', "%$id%");
        }

    }
    public function scopeNombre($query, $nombre){
        if($nombre){
            return $query->where('nombre_p', 'LIKE', "%$nombre%");
        }

    }
    public function scopeReferencia($query, $referencia){
        if($referencia){
            return $query->where('referencia', 'LIKE', "%$referencia%");
        }

    }
    public function scopeCategoria($query, $categoria){
        if($categoria){
            return $query->where('id_categoria', 'LIKE', "%$categoria%");
        }

    }
    public function scopePrecio_ex($query, $precio_ex){
        if($precio_ex){
            return $query->where('precio_neto', 'LIKE', "%$precio_ex%");
        }

    }
    public function scopePrecio_in($query, $precio_in){
        if($precio_in){
            return $query->where('precio_iva', 'LIKE', "%$precio_in%");
        }

    }
    public function scopeCantidad($query, $cantidad){
        if($cantidad){
            return $query->where('existencias', 'LIKE', "%$cantidad%");
        }

    }
    public function scopeEstado($query, $estado){
        if($estado != null){
            return $query->where('estado', $estado);
            //return Categoria::whereIn('mostrado_c', [$estado])->get();
        }

    }
    public function scopeOferta($query, $oferta){
        if($oferta != null){
            return $query->where('oferta', $oferta);
            //return Categoria::whereIn('mostrado_c', [$estado])->get();
        }

    }
}
