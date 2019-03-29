@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('confirmation.title_create') }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/confirmation') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __('back') }} </button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {{ Form::open(['url' => '/admin/confirmation', 'class' => 'form-horizontal', 'files' => true]) }}

                        @include ('admin.confirmation.form')

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
