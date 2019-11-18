@extends('layouts.app')

@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <!--@include('admin.sidebar')-->

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Turnos de trabajo</div>
                    <div class="card-body">
                        <a href="{{ url('/turnos-trabajo/create') }}" class="btn btn-success btn-sm" title="Crear turno trabajo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Crear turno de trabajo
                        </a>

                        <form method="GET" action="{{ url('/turnos-trabajo') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Turno Trabajo</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($turnostrabajo as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->TurnoTrabajo }}</td>
                                        <td>
                                            <a href="{{ url('/turnos-trabajo/' . $item->id) }}" title="Ver turno trabajo"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/turnos-trabajo/' . $item->id . '/edit') }}" title="Editar turno trabajo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/turnos-trabajo' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Borrar turno trabajo" onclick="return confirm(&quot;Estás seguro que deseas eliminar el turno de trabajo {{ $item->TurnoTrabajo }}?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $turnostrabajo->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
