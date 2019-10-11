<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransporteProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporte_producto', function (Blueprint $table) {
            $table->bigIncrements('id_trans_prod');
            $table->unsignedInteger('id_producto');
            $table->foreign('id_producto', 'fk_transporte_producto_productos')->references('id_producto')->on('productos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('id_transporte');
            $table->foreign('id_transporte', 'fk_transporte_producto_transportistas')->references('id_transporte')->on('transportistas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('transporte_producto');
    }
}
