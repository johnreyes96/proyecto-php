<div class="form-group {{ $errors->has('TipoServicio') ? 'has-error' : ''}}">
    <label for="TipoServicio" class="control-label">Tipo Servicio</label>
    <input class="form-control" name="TipoServicio" type="text" id="TipoServicio" value="{{ isset($tiposervicio->TipoServicio) ? $tiposervicio->TipoServicio : ''}}" >
    {!! $errors->first('TipoServicio', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
