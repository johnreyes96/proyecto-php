<div class="form-group {{ $errors->has('Marca') ? 'has-error' : ''}}">
    <label for="Marca" class="control-label">{{ 'Marca' }}</label>
    <input class="form-control" name="Marca" type="text" id="Marca" value="{{ isset($marcavehiculo->Marca) ? $marcavehiculo->Marca : ''}}" >
    {!! $errors->first('Marca', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
