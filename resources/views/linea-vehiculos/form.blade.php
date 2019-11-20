<div class="form-group {{ $errors->has('LineaVehiculo') ? 'has-error' : ''}}">
    <label for="LineaVehiculo" class="control-label">Línea Vehículo</label>
    <input class="form-control" name="LineaVehiculo" type="text" id="LineaVehiculo" value="{{ isset($lineavehiculo->LineaVehiculo) ? $lineavehiculo->LineaVehiculo : ''}}" >
    {!! $errors->first('LineaVehiculo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdMarca') ? 'has-error' : ''}}">
    <label for="IdMarca" class="control-label">Marca</label>
    <input class="form-control" name="IdMarca" type="number" id="IdMarca" value="{{ isset($lineavehiculo->IdMarca) ? $lineavehiculo->IdMarca : ''}}" >
    {!! $errors->first('IdMarca', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
