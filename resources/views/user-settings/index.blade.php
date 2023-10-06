@extends('layouts.app')
@section('title')
    {{__('messages.settings')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('layouts.errors')
            @include('user-settings.setting_menu')
        </div>
    </div>
@endsection
