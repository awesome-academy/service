@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                <div class="card-header">{{ __('dashboard') }}</div>

                    <div class="card-body">
                        {{ __('dashboard') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
