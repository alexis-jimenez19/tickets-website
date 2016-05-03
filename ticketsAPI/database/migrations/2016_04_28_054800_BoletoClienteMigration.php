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
            $table->integer('cantidad_b_comprados');
            $table->string('estatus_b');
            $table->integer('boleto_id')->unsigned();
            $table->foreign('boleto_id')->references('id')->on('boletos');
            //$table->foreign('categoria_id')->references('id')->on('categorias');
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
