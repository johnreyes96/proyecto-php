<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bancos')->insert([
        	'descripcion' => 'Bancolombia',
        ]);
        DB::table('bancos')->insert([
        	'descripcion' => 'BBVA',
        ]);
        DB::table('bancos')->insert([
        	'descripcion' => 'Davivienda',
        ]);
        DB::table('bancos')->insert([
        	'descripcion' => 'Banco de Bogotá',
        ]);
        DB::table('bancos')->insert([
        	'descripcion' => 'CityBank',
        ]);
        DB::table('estudios')->insert([
        	'Codigo' => 'GH',
        	'Direccion' => 'Envigado',
        	'Logo' => '',
        	'NIT' => '122322',
        	'RazonSocial' => 'Golden House',
        	'Email' => 'GoldenHouse@gmail.com',
        	'ContactoEstudio' => '3226788872',
        	'nombreContacto' => 'Sebastian Urrea'
        ]);
        DB::table('Sexos')->insert([
            'Descripcion' => 'Masculino'
        ]);
        DB::table('Sexos')->insert([
            'Descripcion' => 'Femenino'
        ]);
        DB::table('Sexos')->insert([
            'Descripcion' => 'Otro'
        ]);
        DB::table('TiposIdentificacion')->insert([
            'Descripcion' => 'Cédula de Ciudadanía'
        ]);
        DB::table('Sitios')->insert([
            'NombreSitio' => 'Flirt4Free',
            'TipoSitio' => 1,
            'Moneda' => 'Créditos'
        ]);
        DB::table('Sitios')->insert([
            'NombreSitio' => 'Chaturbate',
            'TipoSitio' => 2,
            'Moneda' => 'Tokens'
        ]);
        DB::table('Sitios')->insert([
            'NombreSitio' => 'Streamate',
            'TipoSitio' => 1,
            'Moneda' => 'Dólares'
        ]);
        DB::table('Sitios')->insert([
            'NombreSitio' => 'Cam4',
            'TipoSitio' => 1,
            'Moneda' => 'Tokens'
        ]);
        DB::table('Sitios')->insert([
            'NombreSitio' => 'CamSoda',
            'TipoSitio' => 1,
            'Moneda' => 'Tokens'
        ]);
        DB::table('Sitios')->insert([
            'NombreSitio' => 'MyFreeCams',
            'TipoSitio' => 1,
            'Moneda' => 'Tokens'
        ]);
        DB::table('tiposempleados')->insert([
            'descripcion' => 'Monitor'
        ]);
        DB::table('tiposempleados')->insert([
            'descripcion' => 'Administrador'
        ]);
        DB::table('tiposmodelos')->insert([
            'descripcion' => 'Satélite',
            'estudio_id' => 1,
            'PorcentajePago' => 80
        ]);
        DB::table('tiposmodelos')->insert([
            'descripcion' => 'Local',
            'estudio_id' => 1,
            'PorcentajePago' => 60
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'lblAdministracion',
            'Description' => 'Título Administración',
            'ObjType' => 'Label'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'navConfigSitioModelo',
            'Description' => 'Enlace Config Sitio Modelo',
            'ObjType' => 'Nav',
            'routeName' => 'ConfigModeloSitio.index'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'navGestionUsuarios',
            'Description' => 'listNavGestionUsuarios',
            'ObjType' => 'NavList'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'navModelos',
            'Description' => 'Enlace Modelos',
            'ObjType' => 'Nav',
            'routeName' => 'GestionUsuarios.index'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'navGestionHabitaciones',
            'Description' => 'Enlace Gestión Habitaciones',
            'ObjType' => 'Nav'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'navGestionSedes',
            'Description' => 'Enlace Gestión Sedes',
            'ObjType' => 'Nav'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'navMonitoresAdmin',
            'Description' => 'Enlace Gestión Monitores / Admin',
            'ObjType' => 'Nav'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'lblEstudio',
            'Description' => 'Titulo Navegacion Estudio',
            'ObjType' => 'Label'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'navReservaHabitaciones',
            'Description' => 'Enlace Reserva Habitaciones',
            'ObjType' => 'Nav'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'navNovedades',
            'Description' => 'Enlace Novades',
            'ObjType' => 'Nav'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'lblFinanzas',
            'Description' => 'Label Titulo Finanzas',
            'ObjType' => 'Label'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'navNomina',
            'Description' => 'Enlace Nomina',
            'ObjType' => 'Nav'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'navGestionPrestamos',
            'Description' => 'Enlace Gestión Prestamos',
            'ObjType' => 'Nav',
            'routeName' => 'Prestamo.index'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'navRegistroTiempoDiario',
            'Description' => 'Enlace Registro Tiempo Diario',
            'ObjType' => 'Nav',
            'routeName' => 'RegistroTD.index'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'navGestionHorarios',
            'Description' => 'Enlace Gestión Horarios',
            'ObjType' => 'Nav'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'lblModelo',
            'Description' => 'Label Titulo Modelo',
            'ObjType' => 'Label'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'navHorarioModelo',
            'Description' => 'Enlace Horario Modelo',
            'ObjType' => 'Nav'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'tblRegistrosTiemposModelo',
            'Description' => 'Tabla Registros Tiempos Modelo',
            'ObjType' => 'Table'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'tblModelosEnTransmision',
            'Description' => 'Tabla de Modelos en Transmisión',
            'ObjType' => 'Table'
        ]);
        DB::table('Object')->insert([
            'ObjName' => 'navRegistroTransmision',
            'Description' => 'Enlace Registro Transmisión',
            'ObjType' => 'Nav',
            'routeName' => 'RegistroTD.index'
        ]);
    }
}
