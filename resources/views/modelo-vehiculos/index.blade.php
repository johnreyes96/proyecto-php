@extends('layouts.app')

@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <!--@include('admin.sidebar')-->

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Modelos de vehículo</div>
                    <div class="card-body">
                        <a href="{{ url('/modelo-vehiculos/create') }}" class="btn btn-success btn-sm" title="Crear modelo vehículo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Crear modelo de vehículo
                        </a>

                        <form method="GET" action="{{ url('/modelo-vehiculos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Modelo</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($modelovehiculos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Modelo }}</td>
                                        <td>
                                            <a href="{{ url('/modelo-vehiculos/' . $item->id) }}" title="Ver modelo vehículo"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/modelo-vehiculos/' . $item->id . '/edit') }}" title="Editar modelo vehículo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/modelo-vehiculos' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Borrar modelo vehículo" onclick="return confirm(&quot;Estás seguro que deseas eliminar el modelo de vehículo {{ $item->Modelo }}?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $modelovehiculos->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
