<div class="form-group {{ $errors->has('NombreCiudad') ? 'has-error' : ''}}">
    <label for="NombreCiudad" class="control-label">Nombre ciudad</label>
    <input class="form-control" name="NombreCiudad" type="text" id="NombreCiudad" value="{{ isset($ciudade->NombreCiudad) ? $ciudade->NombreCiudad : ''}}" >
    {!! $errors->first('NombreCiudad', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
