<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdministradoresMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administradores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_a');
            $table->string('apellido_a');
            $table->string('correo_a');
            $table->string('username_a');
            $table->string('password_a');
            $table->string('pais_a');
            $table->string('estado_a');
            $table->string('direccion_a');
            $table->string('telefono_a');
            $table->string('celular_a');
            $table->integer('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id')->on('roles');
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
        Schema::drop('administradores');
    }
}
