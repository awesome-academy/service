@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('permission.title') }} {{ $permission->name }}</div>
                    <div class="card-body">

                    <a href="{{ url('/admin/permission') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __('back') }}</button></a>
                    <a href="{{ url('/admin/permission/' . $permission->id . '/edit') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ __('edit') }}</button></a>
                        {{ Form::open([
                            'method' => 'DELETE',
                            'url' => ['admin/permission', $permission->id],
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
                                    <th>{{ __('id') }}</th><td>{{ $permission->id }}</td>
                                    </tr>
                                    <tr><th>{{ __('name') }}</th><td> {{ $permission->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
