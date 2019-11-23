@extends('layouts.app')

@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <!--@include('admin.sidebar')-->

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Crear un nuevo vehículo</div>
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

                        <form method="POST" action="{{ url('/vehiculos') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('vehiculos.form', ['formMode' => 'create',
                                'tipoVehiculos' => $tipoVehiculos, 
                                'marcas' => $marcas,
                                'modeloVehiculos' => $modeloVehiculos,
                                'colorVehiculos' => $colorVehiculos,
                                'ciudades' => $ciudades,
                                'clientes' => $clientes,
                                'modalidadServicios' => $modalidadServicios])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
