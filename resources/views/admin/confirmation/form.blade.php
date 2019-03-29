<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('name', __('name'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    {{ Form::label('address', __('address'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-12">
        {{ Form::text('address', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('request') ? 'has-error' : '' }}">
    {{ Form::label('request', __('requirement'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-12">
        {{ Form::textarea('request', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        {!! $errors->first('request', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    {{ Form::label('phone', __('phone'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::text('phone', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
    {{ Form::label('location', __('location.title'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-3">
        {{ Form::select('location', $locations, ($confirmation->location_id !== null) ? $confirmation->location->id : null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('menu') ? 'has-error' : '' }}">
    {{ Form::label('menu', __('menu.title'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-3">
        {{ Form::select('menu', $menus, ($confirmation->location_id !== null) ? $confirmation->menu->id : null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {{ Form::submit(isset($submitButtonText) ? $submitButtonText : __('create'), ['class' => 'btn btn-primary']) }}
    </div>
</div>
