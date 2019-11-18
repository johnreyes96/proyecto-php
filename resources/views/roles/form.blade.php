<div class="form-group {{ $errors->has('Rol') ? 'has-error' : ''}}">
    <label for="Rol" class="control-label">{{ 'Rol' }}</label>
    <input class="form-control" name="Rol" type="number" id="Rol" value="{{ isset($role->Rol) ? $role->Rol : ''}}" >
    {!! $errors->first('Rol', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Descripcion') ? 'has-error' : ''}}">
    <label for="Descripcion" class="control-label">Descripción</label>
    <input class="form-control" name="Descripcion" type="text" id="Descripcion" value="{{ isset($role->Descripcion) ? $role->Descripcion : ''}}" >
    {!! $errors->first('Descripcion', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
