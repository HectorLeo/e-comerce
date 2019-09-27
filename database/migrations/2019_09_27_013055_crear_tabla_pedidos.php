<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->Increments('id_pedido');
            $table->unsignedInteger('id_envio');
            $table->foreign('id_envio', 'fk_pedidos_envios')->references('id_envio')->on('envios')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('id_transporte');
            $table->foreign('id_transporte', 'fk_pedidos_transportistas')->references('id_transporte')->on('transportistas')->onDelete('restrict')->onUpdate('restrict');
            $table->string('correo', 100);
            $table->foreign('correo', 'fk_pedidos_usuarios')->references('correo')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('id_direccion');
            $table->foreign('id_direccion', 'fk_pedidos_direcciones')->references('id_direccion')->on('direcciones')->onDelete('restrict')->onUpdate('restrict');
            $table->float('cantidad_ped');
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
        Schema::dropIfExists('pedidos');
    }
}
