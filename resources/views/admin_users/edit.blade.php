@extends('layouts.app')
@section('title')
    {{__('messages.admin.edit_admin')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end mb-5">
                    <h1> {{__('messages.admin.edit_admin')}}</h1>
                    <a class="btn btn-outline-primary float-end"
                       href="{{ route('admins.index') }}">{{ __('messages.common.back') }}</a>
                </div>
                <div class="col-12">
                    @include('layouts.errors')
                </div>
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => ['admins.update', $user->id], 'method' => 'put',
                                'files' => 'true','id'=>'userEditForm']) !!}
                        @include('admin_users.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
