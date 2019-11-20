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

                        <form method="POST" action="{{ url('vehiculos' . '/' . $vehiculo->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Borrar vehículo" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $vehiculo->id }}</td>
                                    </tr>
                                    <tr><th> Placa </th><td> {{ $vehiculo->Placa }} </td></tr>
                                    <tr><th> Tipo Vehículo </th><td> {{ $vehiculo->IdTipoVehiculo }} </td></tr>
                                    <tr><th> Marca </th><td> {{ $vehiculo->IdMarca }} </td></tr>
                                    <tr><th> Modelo </th><td> {{ $vehiculo->IdModelo }} </td></tr>
                                    <tr><th> Color </th><td> {{ $vehiculo->IdColor }} </td></tr>
                                    <tr><th> Licencia Tránsito </th><td> {{ $vehiculo->Licenciatransito }} </td></tr>
                                    <tr><th> Ciudad Licencia </th><td> {{ $vehiculo->IdCiudadLicencia }} </td></tr>
                                    <tr><th> Cliente </th><td> {{ $vehiculo->IdUsuario }} </td></tr>
                                    <tr><th> Modalidad Servicio </th><td> {{ $vehiculo->IdModalidadServicio }} </td></tr>
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
