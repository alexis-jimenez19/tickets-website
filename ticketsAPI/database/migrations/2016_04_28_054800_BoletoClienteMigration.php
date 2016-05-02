<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BoletoClienteMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletos_clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_b');
            $table->string('precio_b');
            $table->integer('cantidad_b_comprados');
            $table->string('evento_id');
            $table->string('estatus_b');
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
        Schema::drop('boletos_clientes');
    }
}
