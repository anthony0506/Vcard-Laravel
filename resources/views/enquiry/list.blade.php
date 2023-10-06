@extends('layouts.app')
@section('title')
    {{__('messages.enquiry')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('layouts.errors')
            <livewire:enquiries-table/>
        </div>
    </div>

    @include('enquiry.vacrd_enquiries_show')
@endsection
