<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDetPedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_pedidos', function (Blueprint $table) {
            $table->Increments('id_det_pedido');
            $table->unsignedInteger('id_pedido');
            $table->foreign('id_pedido', 'fk_det_pedidos_pedidos')->references('id_pedido')->on('pedidos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('id_producto');
            $table->foreign('id_producto', 'fk_det_pedidos_productos')->references('id_producto')->on('productos')->onDelete('restrict')->onUpdate('restrict');
            $table->float('cantidad_detp');
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
        Schema::dropIfExists('det_pedidos');
    }
}
