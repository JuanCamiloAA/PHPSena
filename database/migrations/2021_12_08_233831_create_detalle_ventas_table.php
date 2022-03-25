<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id('IdDetalle');
            $table->unsignedBigInteger('IdProducto');  
            $table->foreign('IdProducto')->references('IdProducto')->on('productos');
            $table->unsignedBigInteger('IdVentas');  
            $table->foreign('IdVentas')->references('IdVentas')->on('ventas');
            $table->integer('cantidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
}
