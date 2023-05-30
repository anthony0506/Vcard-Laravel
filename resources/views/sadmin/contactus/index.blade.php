@extends('layouts.app')
@section('title')
    {{__('messages.contact_us.contact_us')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:contact-us-table/>
        </div>
    </div>
@endsection
