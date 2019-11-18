<div class="form-group {{ $errors->has('Modelo') ? 'has-error' : ''}}">
    <label for="Modelo" class="control-label">{{ 'Modelo' }}</label>
    <input class="form-control" name="Modelo" type="text" id="Modelo" value="{{ isset($modelovehiculo->Modelo) ? $modelovehiculo->Modelo : ''}}" >
    {!! $errors->first('Modelo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
