<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransporteRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporte_rol', function (Blueprint $table) {
            $table->bigIncrements('id_tran_rol');
            $table->unsignedInteger('clave_rol');
            $table->foreign('clave_rol', 'fk_transporte_rol_rol')->references('clave_rol')->on('rol')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('id_transporte');
            $table->foreign('id_transporte', 'fk_transporte_rol_transportistas')->references('id_transporte')->on('transportistas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('transporte_rol');
    }
}
