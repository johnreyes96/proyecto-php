<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('usuario', 50)->unique();
            $table->string('Nombres');
            $table->string('Apellidos');
            $table->string('email', 100)->unique();
            $table->string('DireccionResidencia');
            $table->date('FechaNacimiento');
            $table->bigInteger('Celular');
            $table->string('Sexo', 1);
            $table->string('password', 60);
            $table->unsignedBigInteger('CiudadResidencia_id');
            $table->unsignedBigInteger('EstadoUsuario_id');
            $table->rememberToken();


            $table->foreign('CiudadResidencia_id')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('EstadoUsuario_id')->references('id')->on('estado_usuarios')->onDelete('cascade');


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
        Schema::dropIfExists('users');
    }
}
