@extends('layouts.app')
@section('title')
    {{ __('messages.settings') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            @include('layouts.errors')
            @include('settings.setting_menu')
            @yield('section')
        </div>
    </div>
@endsection
