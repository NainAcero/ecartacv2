<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('tienda_id')->unsigned();
            $table->bigInteger('delivery_id')->unsigned();

            $table->String('nombre', 120);
            $table->String('telefono', 30);
            $table->String('direccion');

            $table->boolean('aceptar')->default(0)->nullable();

            $table->foreign('tienda_id')->references('id')->on('tiendas')
                ->onUpdate('cascade');

            $table->foreign('delivery_id')->references('id')->on('deliveries')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('pedidos');
    }
}
