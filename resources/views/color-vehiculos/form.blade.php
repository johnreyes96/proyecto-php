<div class="form-group {{ $errors->has('Color') ? 'has-error' : ''}}">
    <label for="Color" class="control-label">{{ 'Color' }}</label>
    <input class="form-control" name="Color" type="text" id="Color" value="{{ isset($colorvehiculo->Color) ? $colorvehiculo->Color : ''}}" >
    {!! $errors->first('Color', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
