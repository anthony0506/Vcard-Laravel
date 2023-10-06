@extends('layouts.app')
@section('title')
    {{__('messages.state.states')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:state-table/>
        </div>
    </div>

    @include('sadmin.states.add_modal')
    @include('sadmin.states.edit_modal')
@endsection
