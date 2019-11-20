<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstadoServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('IdTipoServicio')->unsigned();
            $table->string('EstadoServicio', 20);
        });

        Schema::table('estado_servicios', function (Blueprint $table) {
            $table->foreign('IdTipoServicio')->references('id')->on('tipo_servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estado_servicios');
    }
}
