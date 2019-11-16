<div class="form-group {{ $errors->has('Estado') ? 'has-error' : ''}}">
    <label for="Estado" class="control-label">{{ 'Estado' }}</label>
    <input class="form-control" name="Estado" type="text" id="Estado" value="{{ isset($estadousuario->Estado) ? $estadousuario->Estado : ''}}" >
    {!! $errors->first('Estado', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
