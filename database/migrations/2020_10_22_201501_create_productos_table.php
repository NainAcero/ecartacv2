<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tienda_id')->unsigned();
            $table->string('slug');
            $table->string('producto')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('contenido')->nullable();
            $table->decimal('precio', 10,2)->nullable();
            $table->decimal('oferta', 10,2)->nullable();
            $table->string('portada')->nullable();
            $table->boolean('destacado')->nullable();
            $table->boolean('estado')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('productos');
    }
}
