@extends('layouts.app')
@section('title')
    {{ __('messages.language') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:language-table/>
        </div>
    </div>

    @include('sadmin.languages.add_modal')
    @include('sadmin.languages.edit_modal')
@endsection
