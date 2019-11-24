<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaImagenesProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_producto', function (Blueprint $table) {
            $table->unsignedInteger('id_producto');
            $table->foreign('id_producto', 'fk_imagenes_producto_producto')->references('id_producto')->on('productos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('url', 200);
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
        Schema::dropIfExists('imagenes_producto');
    }
}
