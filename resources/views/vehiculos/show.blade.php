@extends('layouts.app')

@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <!--@include('admin.sidebar')-->

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Vehículo #{{ $vehiculo->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/vehiculos') }}" title="Regresar"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/vehiculos/' . $vehiculo->id . '/edit') }}" title="Editar vehículo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $vehiculo->id }}</td>
                                    </tr>
                                    <tr><th> Placa </th><td> {{ $vehiculo->Placa }} </td></tr>
                                    <tr><th> Tipo Vehículo </th><td> {{ $vehiculo->TipoVehiculo }} </td></tr>
                                    <tr><th> Marca </th><td> {{ $vehiculo->Marca }} </td></tr>
                                    <tr><th> Modelo </th><td> {{ $vehiculo->Modelo }} </td></tr>
                                    <tr><th> Color </th><td> {{ $vehiculo->Color }} </td></tr>
                                    <tr><th> Licencia Tránsito </th><td> {{ $vehiculo->LicenciaTransito }} </td></tr>
                                    <tr><th> Ciudad Licencia </th><td> {{ $vehiculo->NombreCiudad }} </td></tr>
                                    <tr><th> Cliente </th><td> {{ $vehiculo->Nombres }} {{ $vehiculo->Apellidos }} </td></tr>
                                    <tr><th> Modalidad Servicio </th><td> {{ $vehiculo->ModalidadServicio }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
