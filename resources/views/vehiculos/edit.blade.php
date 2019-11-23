@extends('layouts.app')

@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <!--@include('admin.sidebar')-->

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Editar vehículo #{{ $vehiculo->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/vehiculos') }}" title="Regresar"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/vehiculos/' . $vehiculo->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('vehiculos.form', ['formMode' => 'edit',
                                'tipoVehiculos' => $tipoVehiculos,
                                'marcas' => $marcas,
                                'modeloVehiculos' => $modeloVehiculos,
                                'colorVehiculos' => $colorVehiculos,
                                'ciudades' => $ciudades])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
