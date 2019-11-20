@extends('layouts.app')

@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <!--@include('admin.sidebar')-->

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Vehículos</div>
                    <div class="card-body">
                        <a href="{{ url('/vehiculos/create') }}" class="btn btn-success btn-sm" title="Crear vehículo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Crear vehículo
                        </a>

                        <form method="GET" action="{{ url('/vehiculos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Placa</th><th>Tipo vehículo</th><th>Modalidad Servicio</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($vehiculos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Placa }}</td><td>{{ $item->IdTipoVehiculo }}</td><td>{{ $item->IdModalidadServicio }}</td>
                                        <td>
                                            <a href="{{ url('/vehiculos/' . $item->id) }}" title="Ver vehículo"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/vehiculos/' . $item->id . '/edit') }}" title="Editar vehículo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/vehiculos' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Borrar vehículo" onclick="return confirm(&quot;Estás seguro que deseas eliminar el vehículo con placas {{ $item->Placa }}?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $vehiculos->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
