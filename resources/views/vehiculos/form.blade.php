<div class="form-group {{ $errors->has('Placa') ? 'has-error' : ''}}">
    <label for="Placa" class="control-label">{{ 'Placa' }}</label>
    <input class="form-control" name="Placa" type="text" id="Placa" value="{{ isset($vehiculo->Placa) ? $vehiculo->Placa : ''}}" >
    {!! $errors->first('Placa', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdTipoVehiculo') ? 'has-error' : ''}}">
    <label for="IdTipoVehiculo" class="control-label">{{ 'Idtipovehiculo' }}</label>
    <input class="form-control" name="IdTipoVehiculo" type="number" id="IdTipoVehiculo" value="{{ isset($vehiculo->IdTipoVehiculo) ? $vehiculo->IdTipoVehiculo : ''}}" >
    {!! $errors->first('IdTipoVehiculo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdMarca') ? 'has-error' : ''}}">
    <label for="IdMarca" class="control-label">{{ 'Idmarca' }}</label>
    <input class="form-control" name="IdMarca" type="number" id="IdMarca" value="{{ isset($vehiculo->IdMarca) ? $vehiculo->IdMarca : ''}}" >
    {!! $errors->first('IdMarca', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdModelo') ? 'has-error' : ''}}">
    <label for="IdModelo" class="control-label">{{ 'Idmodelo' }}</label>
    <input class="form-control" name="IdModelo" type="number" id="IdModelo" value="{{ isset($vehiculo->IdModelo) ? $vehiculo->IdModelo : ''}}" >
    {!! $errors->first('IdModelo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdColor') ? 'has-error' : ''}}">
    <label for="IdColor" class="control-label">{{ 'Idcolor' }}</label>
    <input class="form-control" name="IdColor" type="number" id="IdColor" value="{{ isset($vehiculo->IdColor) ? $vehiculo->IdColor : ''}}" >
    {!! $errors->first('IdColor', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('LicenciaTransito') ? 'has-error' : ''}}">
    <label for="LicenciaTransito" class="control-label">{{ 'Licenciatransito' }}</label>
    <input class="form-control" name="LicenciaTransito" type="text" id="LicenciaTransito" value="{{ isset($vehiculo->LicenciaTransito) ? $vehiculo->LicenciaTransito : ''}}" >
    {!! $errors->first('LicenciaTransito', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdCiudadLicencia') ? 'has-error' : ''}}">
    <label for="IdCiudadLicencia" class="control-label">{{ 'Idciudadlicencia' }}</label>
    <input class="form-control" name="IdCiudadLicencia" type="number" id="IdCiudadLicencia" value="{{ isset($vehiculo->IdCiudadLicencia) ? $vehiculo->IdCiudadLicencia : ''}}" >
    {!! $errors->first('IdCiudadLicencia', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdUsuario') ? 'has-error' : ''}}">
    <label for="IdUsuario" class="control-label">{{ 'Idusuario' }}</label>
    <input class="form-control" name="IdUsuario" type="number" id="IdUsuario" value="{{ isset($vehiculo->IdUsuario) ? $vehiculo->IdUsuario : ''}}" >
    {!! $errors->first('IdUsuario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdModalidadServicio') ? 'has-error' : ''}}">
    <label for="IdModalidadServicio" class="control-label">{{ 'Idmodalidadservicio' }}</label>
    <input class="form-control" name="IdModalidadServicio" type="number" id="IdModalidadServicio" value="{{ isset($vehiculo->IdModalidadServicio) ? $vehiculo->IdModalidadServicio : ''}}" >
    {!! $errors->first('IdModalidadServicio', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
