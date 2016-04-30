<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_e');
            $table->string('ciudad_e');
            $table->string('estado_e');
            $table->string('pais_e');
            $table->string('lugar_e');
            $table->string('fecha_e');
            $table->string('hora_e');
            $table->string('inicio_venta');
            $table->string('imagen_e');
            $table->integer('administrador_id')->unsigned();
            $table->foreign('administrador_id')->references('id')->on('administradores');
            $table->integer('subcategoria_id')->unsigned();
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
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
        Schema::drop('eventos');
    }
}
