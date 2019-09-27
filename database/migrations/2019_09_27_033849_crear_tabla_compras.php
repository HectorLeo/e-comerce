<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCompras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->Increments('id_compra');
            $table->unsignedInteger('id_venta');
            $table->foreign('id_venta', 'fk_compras_ventas')->references('id_venta')->on('ventas')->onDelete('restrict')->onUpdate('restrict');
            $table->string('transporte', 30);
            $table->string('forma_pago', 30);
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
        Schema::dropIfExists('compras');
    }
}
