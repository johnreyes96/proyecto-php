<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('Placa')->nullable();
            $table->integer('IdTipoVehiculo')->nullable();
            $table->integer('IdMarca')->nullable();
            $table->integer('IdModelo')->nullable();
            $table->integer('IdColor')->nullable();
            $table->string('LicenciaTransito')->nullable();
            $table->integer('IdCiudadLicencia')->nullable();
            $table->integer('IdUsuario')->nullable();
            $table->integer('IdModalidadServicio')->nullable();
            $table->foreign('IdTipoVehiculo')->references('id')->on('tipo_vehiculos');
            $table->foreign('IdMarca')->references('id')->on('marca_vehiculos');
            $table->foreign('IdModelo')->references('id')->on('modelo_vehiculos');
            $table->foreign('IdColor')->references('id')->on('color_vehiculos');
            $table->foreign('IdCiudadLicencia')->references('id')->on('ciudades');
            $table->foreign('IdModalidadServicio')->references('id')->on('modalidad_servicios');
            $table->foreign('IdUsuario')->references('id')->on('users');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehiculos');
    }
}
