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
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->timestamps();
            $table->string('Placa', 10);
            $table->integer('IdTipoVehiculo')->unsigned();
            $table->integer('IdMarca')->nullable()->unsigned();
            $table->integer('IdModelo')->nullable()->unsigned();
            $table->integer('IdColor')->nullable()->unsigned();
            $table->string('LicenciaTransito', 100)->nullable();
            $table->integer('IdCiudadLicencia')->nullable()->unsigned();
            $table->bigInteger('IdUsuario')->nullable()->unsigned();
            $table->integer('IdModalidadServicio')->unsigned();
            });

        Schema::table('vehiculos', function (Blueprint $table) {
            $table->foreign('IdTipoVehiculo')->references('id')->on('tipo_vehiculos')->onDelete('cascade');
            $table->foreign('IdMarca')->references('id')->on('marca_vehiculos')->onDelete('cascade');
            $table->foreign('IdModelo')->references('id')->on('modelo_vehiculos')->onDelete('cascade');
            $table->foreign('IdColor')->references('id')->on('color_vehiculos')->onDelete('cascade');
            $table->foreign('IdCiudadLicencia')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('IdUsuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('IdModalidadServicio')->references('id')->on('modalidad_servicios')->onDelete('cascade');
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
