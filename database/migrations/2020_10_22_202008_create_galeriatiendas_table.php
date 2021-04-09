<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriatiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeriatiendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('galeria_id')->unsigned();
            $table->bigInteger('tienda_id')->unsigned();
            
            $table->timestamps();
            $table->foreign('galeria_id')->references('id')->on('galerias')
                ->onUpdate('cascade');
            $table->foreign('tienda_id')->references('id')->on('tiendas')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galeriatiendas');
    }
}
