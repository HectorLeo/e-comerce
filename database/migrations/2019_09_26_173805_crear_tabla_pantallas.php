<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPantallas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pantallas', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nom_pantalla', 40);
            $table->string('descripcion', 20);
            $table->boolean('agregar');
            $table->boolean('modificar');
            $table->boolean('eliminar');
            $table->boolean('consultar');
            $table->boolean('activa');
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
        Schema::dropIfExists('pantallas');
    }
}
