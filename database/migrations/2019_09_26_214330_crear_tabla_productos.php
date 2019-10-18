<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->Increments('id_producto');
            $table->unsignedInteger('id_categoria');
            $table->foreign('id_categoria', 'fk_productos_categorias')->references('id_categoria')->on('categorias')->onDelete('restrict')->onUpdate('restrict');
            $table->string('nombre_p',30);
            $table->string('referncia',50);
            $table->float('precio_neto');
            $table->float('precio_iva');
            $table->string('resumen_producto',200);
            $table->string('descripcion_producto',500);
            $table->string('imagen_p',50);
            $table->integer('existencias');
            $table->float('p_anchura');
            $table->float('p_altura');
            $table->float('p_profundidad');
            $table->float('p_peso');
            $table->string('plazo_entrega_p', 50);
            $table->float('gasto_envio_p');
            $table->float('precio_mayoreo_p');
            $table->integer('cantidad minima');
            $table->integer('cantidad_mayoreo');
            $table->boolean('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
