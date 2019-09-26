<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTransportistas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportistas', function (Blueprint $table) {
            $table->Increments('id_transporte');
            $table->boolean('envio_gratis');
            $table->string('nombre_transporte', 50);
            $table->boolean('estado_transporte', 50);
            $table->string('logotipo_transporte', 50);
            $table->string('retraso_transporte', 100);
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
        Schema::dropIfExists('transportistas');
    }
}
