@extends('layouts.app')
@section('title')
    {{__('messages.plan.features')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:feature-table/>
        </div>
    </div>
@endsection
