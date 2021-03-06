@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('dish.title') }} {{ $dish->name }}</div>
                    <div class="card-body">

                    <a href="{{ url('/admin/dish') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __('back') }}</button></a>
                    <a href="{{ url('/admin/dish/' . $dish->id . '/edit') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ __('edit') }}</button></a>
                        {{ Form::open([
                            'method' => 'DELETE',
                            'url' => ['admin/dish', $dish->id],
                            'style' => 'display:inline'
                        ]) }}
                            {{ Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>' . __('delete'), [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-sm',
                                'onclick' => 'return confirm(' . __('notification.delete') . ')'
                            ]) }}
                        {{ Form::close() }}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>{{ __('id') }}</th><td>{{ $dish->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('name') }}</th><td> {{ $dish->name }} </td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('price') }}</th><td> {{ $dish->price }} {{ __('currency') }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('image') }}</th><td><img src="{{ '/' . $dish->link_image }}"/></td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('typeDish') }}</th><td>{{ $dish->typeDish->name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
