@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('user.title') }} {{ $user->name }}</div>
                    <div class="card-body">

                    <a href="{{ url('/admin/user') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __('back') }}</button></a>
                    <a href="{{ url('/admin/user/' . $user->id . '/edit') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ __('edit') }}</button></a>
                        {{ Form::open([
                            'method' => 'DELETE',
                            'url' => ['admin/user', $user->id],
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
                                        <th>{{ __('id') }}</th><td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('name') }}</th><td> {{ $user->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> {{ __('email') }} </th><td> {{ $user->email }} </td>
                                    </tr>
                                    <tr>
                                        <th> {{ __('password') }} </th><td> {{ $user->password }} </td>
                                    </tr>
                                    <tr>
                                        <th> {{ __('roles') }} </th><td>{{ implode(', ', $roles) }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('permissions') }}</th><td>{{ implode(', ', $permissions) }}</td>
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
