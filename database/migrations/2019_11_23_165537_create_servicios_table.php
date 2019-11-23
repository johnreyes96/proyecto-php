<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->bigInteger('IdUsuario')->nullable()->unsigned();
            $table->dateTime('FechaProceso')->nullable();
            $table->integer('IdPersonal')->nullable()->unsigned();
            $table->integer('IdEstadoServicio')->nullable()->unsigned();
            $table->double('ValoTotal')->nullable();
        });

        Schema::table('servicios', function (Blueprint $table) {
            $table->foreign('IdUsuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('IdEstadoServicio')->references('id')->on('estado_servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('servicios');
    }
}
