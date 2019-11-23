<div class="form-group {{ $errors->has('IdUsuario') ? 'has-error' : ''}}">
    <label for="IdUsuario" class="control-label">{{ 'Idusuario' }}</label>
    <input class="form-control" name="IdUsuario" type="number" id="IdUsuario" value="{{ isset($servicio->IdUsuario) ? $servicio->IdUsuario : ''}}" >
    {!! $errors->first('IdUsuario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('FechaProceso') ? 'has-error' : ''}}">
    <label for="FechaProceso" class="control-label">{{ 'Fechaproceso' }}</label>
    <input class="form-control" name="FechaProceso" type="datetime-local" id="FechaProceso" value="{{ isset($servicio->FechaProceso) ? $servicio->FechaProceso : ''}}" >
    {!! $errors->first('FechaProceso', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdPersonal') ? 'has-error' : ''}}">
    <label for="IdPersonal" class="control-label">{{ 'Idpersonal' }}</label>
    <input class="form-control" name="IdPersonal" type="number" id="IdPersonal" value="{{ isset($servicio->IdPersonal) ? $servicio->IdPersonal : ''}}" >
    {!! $errors->first('IdPersonal', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IdEstadoServicio') ? 'has-error' : ''}}">
    <label for="IdEstadoServicio" class="control-label">{{ 'Idestadoservicio' }}</label>
    <input class="form-control" name="IdEstadoServicio" type="number" id="IdEstadoServicio" value="{{ isset($servicio->IdEstadoServicio) ? $servicio->IdEstadoServicio : ''}}" >
    {!! $errors->first('IdEstadoServicio', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ValoTotal') ? 'has-error' : ''}}">
    <label for="ValoTotal" class="control-label">{{ 'Valototal' }}</label>
    <input class="form-control" name="ValoTotal" type="number" id="ValoTotal" value="{{ isset($servicio->ValoTotal) ? $servicio->ValoTotal : ''}}" >
    {!! $errors->first('ValoTotal', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
