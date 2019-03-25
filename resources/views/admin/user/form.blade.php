<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('name', __('name'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        {{ $errors->first('name', '<p class="help-block">:message</p>') }}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    {{ Form::label('email', __('email'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::email('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        {{ $errors->first('email', '<p class="help-block">:message</p>') }}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    {{ Form::label('password', __('password'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::password('password', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        {{ $errors->first('password', '<p class="help-block">:message</p>') }}
    </div>
</div>

<div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
    {{ Form::label('roles', __('roles'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::select('roles[]', $roles, isset($user) ? $user->getRoleNames() : null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'multiple']) }}
        {{ $errors->first('roles', '<p class="help-block">:message</p>') }}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {{ Form::submit(isset($submitButtonText) ? $submitButtonText : __('create'), ['class' => 'btn btn-primary']) }}
    </div>
</div>
