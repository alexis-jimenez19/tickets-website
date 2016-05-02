<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_u');
            $table->string('apellido_u');
            $table->string('correo_u');
            $table->string('username_u');
            $table->string('password_u');
            $table->string('pais_u');
            $table->string('estado_u');
            $table->string('direccion_u');
            $table->string('telefono_u');
            $table->string('celular_u');
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
        //Schema::drop('boleto_boletocliente');
        Schema::drop('clientes');
    }
}
