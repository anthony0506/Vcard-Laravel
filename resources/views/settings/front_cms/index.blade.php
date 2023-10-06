@extends('layouts.app')
@section('title')
    {{__('messages.front_cms.front_cms')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            @include('layouts.errors')
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'setting.front.cms.update','enctype' => 'multipart/form-data']) !!}
                        @include('settings.front_cms.fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    
@endsection
