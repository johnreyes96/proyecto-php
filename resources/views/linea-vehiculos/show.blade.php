@extends('layouts.app')

@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <!--@include('admin.sidebar')-->

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Línea de vehículo #{{ $lineavehiculo->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/linea-vehiculos') }}" title="Regresar"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/linea-vehiculos/' . $lineavehiculo->id . '/edit') }}" title="Editar línea vehículo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $lineavehiculo->id }}</td>
                                    </tr>
                                    <tr><th> Línea Vehículo </th><td> {{ $lineavehiculo->LineaVehiculo }} </td></tr><tr><th> Marca </th><td> {{ $lineavehiculo->Marca }} </td></tr>
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
