@extends('layouts.app')
@section('title')
    {{ __('messages.appointments') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
                <a href="{{ route('appointments.index') }}"
                   class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column flex-lg-row">
            <div class="flex-lg-row-fluid">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">{{__('messages.appointment.calendar')}}</h2>
                </div>
                <div class="card-body pt-0">
                    <div id="appointmentCalendar"></div>
                </div>
            </div>
            </div>
        </div>
    </div>
    @include('appointment.appointment-model')
@endsection
