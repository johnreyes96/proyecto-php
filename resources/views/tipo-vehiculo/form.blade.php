<div class="form-group {{ $errors->has('TipoVehiculo') ? 'has-error' : ''}}">
    <label for="TipoVehiculo" class="control-label">Tipo Vehículo</label>
    <input class="form-control" name="TipoVehiculo" type="text" id="TipoVehiculo" value="{{ isset($tipovehiculo->TipoVehiculo) ? $tipovehiculo->TipoVehiculo : ''}}" >
    {!! $errors->first('TipoVehiculo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
