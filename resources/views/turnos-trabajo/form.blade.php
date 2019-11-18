<div class="form-group {{ $errors->has('TurnoTrabajo') ? 'has-error' : ''}}">
    <label for="TurnoTrabajo" class="control-label">Turno Trabajo</label>
    <input class="form-control" name="TurnoTrabajo" type="text" id="TurnoTrabajo" value="{{ isset($turnostrabajo->TurnoTrabajo) ? $turnostrabajo->TurnoTrabajo : ''}}" >
    {!! $errors->first('TurnoTrabajo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
