@extends('layouts.app')
@section('title')
    {{__('messages.subscribed_user')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:subscription-table/>
        </div>
    </div>
    @include('sadmin.subscriptionPlan.edit_modal')
    @include('sadmin.subscriptionPlan.show_modal')
@endsection
