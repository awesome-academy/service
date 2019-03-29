<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('name', __('name'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    {{ Form::label('price', __('price'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-12">
        {{ Form::number('price', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    {{ Form::label('image', __('image'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::file('image', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        <img id="preview" src="{{ isset($dish) ? '/' . $dish->link_image : config('image.noImage') }}" width="500px" height="320px"/><br/>
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('typeDish') ? 'has-error' : '' }}">
    {{ Form::label('typeDish', __('typeDish'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-3">
        {{ Form::select('typeDish', $typeDishes, isset($dish) ? $dish->typeDish->id : null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) }}
        {!! $errors->first('typeDish', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {{ Form::submit(isset($submitButtonText) ? $submitButtonText : __('create'), ['class' => 'btn btn-primary']) }}
    </div>
</div>
