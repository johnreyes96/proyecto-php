<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLineaVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_vehiculos', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->timestamps();
            $table->string('LineaVehiculo', 100);
            $table->integer('IdMarca')->unsigned();
        });

        Schema::table('linea_vehiculos', function (Blueprint $table) {
            $table->foreign('IdMarca')->references('id')->on('marca_vehiculos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('linea_vehiculos');
    }
}
