@extends('layouts.app')
@section('title')
    {{__('messages.vcard.affiliate_user')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:withdrawal-table/>
        </div>
    </div>
    @include('sadmin.affiliationWithdraw.reject-withdraw-modal')
    @include('sadmin.affiliationWithdraw.approve-withdraw-modal')
    @include('sadmin.affiliationWithdraw.show-withdraw-modal')
@endsection
