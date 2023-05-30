@extends('layouts.app')
@section('title')
    {{__('messages.vcards')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:vcard-table/>
        </div>
    </div>
@endsection
