<div class="form-group {{ $errors->has('Placa') ? 'has-error' : ''}}">
    <label for="Placa" class="control-label">{{ 'Placa' }}</label>
    <input class="form-control" name="Placa" type="text" id="Placa" value="{{ isset($vehiculo->Placa) ? $vehiculo->Placa : ''}}" >
    {!! $errors->first('Placa', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdTipoVehiculo') ? 'has-error' : ''}}">
    <label for="IdTipoVehiculo" class="control-label">Tipo vehículo</label>
    <select class="form-control" name="IdTipoVehiculo" id="IdTipoVehiculo" >
        @foreach($tipoVehiculos as $tipoVehiculo)
            <option value="{{ $tipoVehiculo->id }}" {{ isset($vehiculo->IdTipoVehiculo) && $vehiculo->IdTipoVehiculo == $tipoVehiculo->id ? 'selected' : ''}} >{{ $tipoVehiculo->TipoVehiculo }}</option>
        @endforeach
    </select>
    {!! $errors->first('IdTipoVehiculo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdMarca') ? 'has-error' : ''}}">
    <label for="IdMarca" class="control-label">Marca</label>
    <select class="form-control" name="IdMarca" id="IdMarca" >
        @foreach($marcas as $marca)
            <option value="{{ $marca->id }}" {{ isset($vehiculo->IdMarca) && $vehiculo->IdMarca == $marca->id ? 'selected' : ''}} >{{ $marca->Marca }}</option>
        @endforeach
    </select>
    {!! $errors->first('IdMarca', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdModelo') ? 'has-error' : ''}}">
    <label for="IdModelo" class="control-label">Modelo</label>
    <select class="form-control" name="IdModelo" id="IdModelo" >
        @foreach($modeloVehiculos as $modeloVehiculo)
            <option value="{{ $modeloVehiculo->id }}" {{ isset($vehiculo->IdModelo) && $vehiculo->IdModelo == $modeloVehiculo->id ? 'selected' : ''}} >{{ $modeloVehiculo->Modelo }}</option>
        @endforeach
    </select>
    {!! $errors->first('IdModelo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdColor') ? 'has-error' : ''}}">
    <label for="IdColor" class="control-label">Color</label>
    <select class="form-control" name="IdColor" id="IdColor" >
        @foreach($colorVehiculos as $colorVehiculo)
            <option value="{{ $colorVehiculo->id }}" {{ isset($vehiculo->IdColor) && $vehiculo->IdColor == $colorVehiculo->id ? 'selected' : ''}} >{{ $colorVehiculo->Color }}</option>
        @endforeach
    </select>
    {!! $errors->first('IdColor', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('LicenciaTransito') ? 'has-error' : ''}}">
    <label for="LicenciaTransito" class="control-label">Licencia Tránsito</label>
    <input class="form-control" name="LicenciaTransito" type="text" id="LicenciaTransito" value="{{ isset($vehiculo->LicenciaTransito) ? $vehiculo->LicenciaTransito : ''}}" >
    {!! $errors->first('LicenciaTransito', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdCiudadLicencia') ? 'has-error' : ''}}">
    <label for="IdCiudadLicencia" class="control-label">Ciudad Licencia</label>
    <select class="form-control" name="IdCiudadLicencia" id="IdCiudadLicencia" >
        @foreach($ciudades as $ciudad)
            <option value="{{ $ciudad->id }}" {{ isset($vehiculo->IdCiudadLicencia) && $vehiculo->IdCiudadLicencia == $ciudad->id ? 'selected' : ''}} >{{ $ciudad->NombreCiudad }}</option>
        @endforeach
    </select>
    {!! $errors->first('IdCiudadLicencia', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdUsuario') ? 'has-error' : ''}}">
    <label for="IdUsuario" class="control-label">Cliente</label>
    <select class="form-control" name="IdUsuario" id="IdUsuario" >
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ isset($vehiculo->IdUsuario) && $vehiculo->IdUsuario == $cliente->id ? 'selected' : ''}} >{{ $cliente->Cliente }}</option>
        @endforeach
    </select>
    {!! $errors->first('IdUsuario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdModalidadServicio') ? 'has-error' : ''}}">
    <label for="IdModalidadServicio" class="control-label">Modalidad Servicio</label>
    <select class="form-control" name="IdModalidadServicio" id="IdModalidadServicio" >
        @foreach($modalidadServicios as $modalidadServicio)
            <option value="{{ $modalidadServicio->id }}" {{ isset($vehiculo->IdModalidadServicio) && $vehiculo->IdModalidadServicio == $modalidadServicio->id ? 'selected' : ''}} >{{ $modalidadServicio->ModalidadServicio }}</option>
        @endforeach
    </select>
    {!! $errors->first('IdModalidadServicio', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
