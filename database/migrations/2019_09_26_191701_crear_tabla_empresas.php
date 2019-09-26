<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->Increments('id_empresa');
            $table->string('correo', 100);
            $table->foreign('correo', 'fk_empresas_usuarios')->references('correo')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            $table->string('cuenta_bancaria_em', 50);
            $table->string('logotipo', 50);

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
        Schema::dropIfExists('empresas');
    }
}
