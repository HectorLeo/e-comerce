<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDirecciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->Increments('direcciones');
            $table->string('calle', 50);
            $table->integer('codigo_postal');
            $table->string('localidad', 50);
            $table->string('ciudad', 50);
            $table->string('telefono', 10);
            $table->string('municipio', 50);
            $table->string('correo', 100);
            $table->foreign('correo', 'fk_direcciones_usuarios')->references('correo')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            $table->string('numero_exterior_d', 3);
            $table->string('numero_interior', 3);
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
        Schema::dropIfExists('direcciones');
    }
}
