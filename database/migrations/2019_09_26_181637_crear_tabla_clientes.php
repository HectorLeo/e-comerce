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
            $table->Increments('usuario_id');
            //$table->integer('id_usuario');
            $table->foreign('usuario_id', 'fk_clientes_usuarios')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            //$table->primary('correo');
            $table->string('nombre', 30);
            $table->string('a_paterno', 30);
            $table->string('a_materno', 30);
            $table->string('telefono', 10);
            $table->unsignedInteger('rol_clave_rol');
            $table->foreign('rol_clave_rol', 'fk_clientes_rol')->references('clave_rol')->on('rol')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('estado');
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
