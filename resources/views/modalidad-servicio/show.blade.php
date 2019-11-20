@extends('layouts.app')

@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <!--@include('admin.sidebar')-->

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Modalidad de servicio #{{ $modalidadservicio->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/modalidad-servicio') }}" title="Regresar"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/modalidad-servicio/' . $modalidadservicio->id . '/edit') }}" title="Editar modalidad servicio"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $modalidadservicio->id }}</td>
                                    </tr>
                                    <tr><th> Modalidad Servicio </th><td> {{ $modalidadservicio->ModalidadServicio }} </td></tr>
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
