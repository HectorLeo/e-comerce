<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPermisos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->Increments('id');

            $table->string('clave_rol', 10);
            $table->foreign('clave_rol')->references('clave_rol')->on('rol')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedInteger('id_pantalla');
            $table->foreign('id_pantalla')->references('id_pantalla')->on('pantallas')->onDelete('restrict')->onUpdate('restrict');
            

            $table->string('nom_pantalla', 40);
            $table->string('descripcion', 50);
            $table->boolean('agregar');
            $table->boolean('modificar');
            $table->boolean('eliminar');
            $table->boolean('consultar');
            

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
        Schema::dropIfExists('permisos');
    }
}
