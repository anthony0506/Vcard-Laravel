@extends('layouts.app')
@section('title')
{{__('messages.cash_payment')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:cash-payment-table/>
        </div>
    </div>
@endsection
