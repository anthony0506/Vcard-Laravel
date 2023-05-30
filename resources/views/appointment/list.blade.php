@extends('layouts.app')
@section('title')
    {{__('messages.appointments')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('layouts.errors')
            <livewire:schedule-appointment-table/>
        </div>
    </div>
@endsection
