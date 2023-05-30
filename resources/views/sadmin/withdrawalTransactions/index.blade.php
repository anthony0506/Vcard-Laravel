@extends('layouts.app')
@section('title')
    {{__('messages.setting.withdraw_transactions')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:withdrawal-transaction-table/>
        </div>
    </div>
@endsection
