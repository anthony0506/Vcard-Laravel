@extends('layouts.app')
@section('title')
    {{__('messages.city.cities')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:city-table/>
        </div>
    </div>

    @include('sadmin.cities.add_modal')
    @include('sadmin.cities.edit_modal')
@endsection
