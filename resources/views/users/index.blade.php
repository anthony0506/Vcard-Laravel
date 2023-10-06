@extends('layouts.app')
@section('title')
    {{__('messages.users')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:user-table/>
        </div>
    </div>
    @include('users.changePassword')
@endsection
