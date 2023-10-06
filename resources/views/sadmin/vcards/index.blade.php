@extends('layouts.app')
@section('title')
    {{__('messages.vcards_templates')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:template-table/>
        </div>
    </div>
@endsection
