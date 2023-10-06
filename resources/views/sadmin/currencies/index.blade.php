@extends('layouts.app')
@section('title')
    {{__('messages.currency.currencies')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:currency-table/>
        </div>
    </div>
@endsection

