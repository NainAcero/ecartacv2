<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest_deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('tienda_id')->unsigned();
            $table->foreign('tienda_id')->references('id')->on('tiendas')
                ->onUpdate('cascade');

            $table->bigInteger('delivery_id')->unsigned();
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
        Schema::dropIfExists('rest_deliveries');
    }
}
