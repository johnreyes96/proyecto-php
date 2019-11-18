<div class="form-group {{ $errors->has('ModalidadServicio') ? 'has-error' : ''}}">
    <label for="ModalidadServicio" class="control-label">Modalidad Servicio</label>
    <input class="form-control" name="ModalidadServicio" type="text" id="ModalidadServicio" value="{{ isset($modalidadservicio->ModalidadServicio) ? $modalidadservicio->ModalidadServicio : ''}}" >
    {!! $errors->first('ModalidadServicio', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
