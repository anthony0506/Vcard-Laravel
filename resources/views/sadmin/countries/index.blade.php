@extends('layouts.app')
@section('title')
    {{__('messages.country.countries')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:country-table/>
        </div>
    </div>

    @include('sadmin.countries.add_modal')
    @include('sadmin.countries.edit_modal')
@endsection
