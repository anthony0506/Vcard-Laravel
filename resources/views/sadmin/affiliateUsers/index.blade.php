@extends('layouts.app')
@section('title')
    {{__('messages.vcard.affiliate_user')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:affiliate-user-table/>
        </div>
    </div>
@endsection
