<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEnvios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envios', function (Blueprint $table) {
            $table->Increments('id_envio');
            $table->unsignedInteger('id_transporte');
            $table->foreign('id_transporte', 'fk_envios_transportistas')->references('id_transporte')->on('transportistas')->onDelete('restrict')->onUpdate('restrict');
            $table->float('anchura');
            $table->float('peso');
            $table->float('profundidad');
            $table->float('altura');
            $table->boolean('cliente');
            $table->boolean('visitante');
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
        Schema::dropIfExists('envios');
    }
}
