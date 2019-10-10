<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaRolesCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_categorias', function (Blueprint $table) {
            $table->Increments('id_rol_categoria');
            $table->unsignedInteger('id_categoria');
            $table->foreign('id_categoria', 'fk_roles_categorias_categorias')->references('id_categoria')->on('categorias')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('clave_rol');
            $table->foreign('clave_rol', 'fk_roles_categorias_rol')->references('clave_rol')->on('rol')->onDelete('restrict')->onUpdate('restrict');

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
        Schema::dropIfExists('roles_categorias');
    }
}
