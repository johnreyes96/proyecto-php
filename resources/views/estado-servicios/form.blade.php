<div class="form-group {{ $errors->has('IdTipoServicio') ? 'has-error' : ''}}">
    <label for="IdTipoServicio" class="control-label">Tipo Servicio</label>
    <select class="form-control" name="IdTipoServicio" id="IdTipoServicio" >
        @foreach($tipoServicios as $tipoServicio)
            <option value="{{ $tipoServicio->id }}" {{ isset($estadoservicio->IdTipoServicio) && $estadoservicio->IdTipoServicio == $tipoServicio->id ? 'selected' : ''}} >{{ $tipoServicio->TipoServicio }}</option>
        @endforeach
    </select>
    {!! $errors->first('IdTipoServicio', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('EstadoServicio') ? 'has-error' : ''}}">
    <label for="EstadoServicio" class="control-label">Estado Servicio</label>
    <input class="form-control" name="EstadoServicio" type="text" id="EstadoServicio" value="{{ isset($estadoservicio->EstadoServicio) ? $estadoservicio->EstadoServicio : ''}}" >
    {!! $errors->first('EstadoServicio', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
