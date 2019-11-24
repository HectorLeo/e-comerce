<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDescuentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descuentos', function (Blueprint $table) {
            $table->Increments('id_descuentos');
            $table->unsignedInteger('id_producto');
            $table->foreign('id_producto', 'fk_descuentos_productos')->references('id_producto')->on('productos')->onDelete('restrict')->onUpdate('restrict');
            $table->float('porcentaje_d');
            $table->float('peso_d');
            $table->float('precio_descuento');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->time('hora_inicio');
            $table->time('hora_fin');
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
        Schema::dropIfExists('descuentos');
    }
}
