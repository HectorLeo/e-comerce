<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->string('correo', 100);
            $table->primary('correo');
            $table->foreign('correo', 'fk_clientes_usuarios')->references('correo')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            //$table->primary('correo');
            $table->string('nombre', 30);
            $table->string('a_paterno', 30);
            $table->string('a_materno', 30);
            $table->string('telefono', 10);
            $table->string('clave_rol', 10);
            $table->foreign('clave_rol', 'fk_clientes_rol')->references('clave_rol')->on('rol')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('clientes');
    }
}
