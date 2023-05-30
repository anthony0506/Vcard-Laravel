@extends('layouts.app')
@section('title')
    {{__('messages.admins')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:super-admin-table/>
        </div>
    </div>
    @include('users.changePassword')
@endsection
