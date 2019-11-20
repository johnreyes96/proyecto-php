@extends('layouts.app')

@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <!--@include('admin.sidebar')-->


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Estado de servicio #{{ $estadoservicio->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/estado-servicios') }}" title="Regresar"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/estado-servicios/' . $estadoservicio->id . '/edit') }}" title="Editar estado servicio"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $estadoservicio->id }}</td>
                                    </tr>
                                    <tr><th> Tipo Servicio </th><td> {{ $estadoservicio->IdTipoServicio }} </td></tr><tr><th> Estado Servicio </th><td> {{ $estadoservicio->EstadoServicio }} </td></tr>
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
