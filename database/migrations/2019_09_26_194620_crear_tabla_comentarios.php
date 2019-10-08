<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaComentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->Increments('id_comentarios');
            $table->unsignedInteger('id_usuario');
            $table->foreign('id_usuario', 'fk_comentarios_usuarios')->references('id_usuario')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            $table->string('comentario', 500);
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
        Schema::dropIfExists('comentarios');
    }
}
