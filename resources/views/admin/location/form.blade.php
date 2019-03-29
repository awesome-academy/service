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

<div class="form-group {{ $errors->has('minPeople') ? 'has-error' : '' }}">
    {{ Form::label('min_people', __('min.people'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-3">
        {{ Form::number('min_people', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        {!! $errors->first('minPeople', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('maxPeople') ? 'has-error' : '' }}">
    {{ Form::label('max_people', __('max.people'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-3">
        {{ Form::number('max_people', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        {!! $errors->first('maxPeople', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    {{ Form::label('status', __('status'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-3">
        {{ Form::select('status', $statuses, isset($location) ? $location->status->id : null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    {{ Form::label('image', __('image'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::file('image', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        <img id="preview" src="{{ isset($location) ? '/' . $location->link_image : config('image.noImage') }}" width="500px" height="320px"/><br/>
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('typeServices') ? 'has-error' : '' }}">
    {{ Form::label('typeServices', __('typeServices'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::select('typeServices[]', $typeServices, isset($location) ? $location->getTypeServiceNames() : null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'multiple']) }}
        {!! $errors->first('typeServices', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {{ Form::submit(isset($submitButtonText) ? $submitButtonText : __('create'), ['class' => 'btn btn-primary']) }}
    </div>
</div>
