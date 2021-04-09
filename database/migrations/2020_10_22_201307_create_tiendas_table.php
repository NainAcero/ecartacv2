<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('persona_id')->unsigned()->nullable();
            $table->string('slug');
            $table->string('tienda')->nullable();
            $table->string('direccion')->nullable();
            $table->text('mapa')->nullable();
            $table->string('portada')->nullable();
            $table->boolean('estado')->nullable();
            $table->timestamps();
            $table->foreign('persona_id')->references('id')->on('personas')
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
        Schema::dropIfExists('tiendas');
    }
}
