@extends('layouts.app')
@section('title')
    {{__('messages.testimonial')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('layouts.errors')
            <livewire:front-testimonial-table/>
        </div>
    </div>

    @include('sadmin.testimonial.create')
    @include('sadmin.testimonial.edit')
    @include('sadmin.testimonial.show')
@endsection
