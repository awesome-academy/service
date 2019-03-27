@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('dish.title_create') }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/dish') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __('back') }} </button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {{ Form::open(['url' => '/admin/dish', 'class' => 'form-horizontal', 'files' => true]) }}

                        @include ('admin.dish.form')

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
