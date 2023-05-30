@extends('layouts.app')
@section('title')
    {{__('messages.subscriptions')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:email-subscription-table/>
        </div>
    </div>
@endsection
