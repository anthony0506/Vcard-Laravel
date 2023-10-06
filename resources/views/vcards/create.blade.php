@extends('layouts.app')
@section('title')
    {{__('messages.vcard.new_vcard')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end mb-5">
                    <h1>@yield('title')</h1>
                    <a class="btn btn-outline-primary float-end"
                       href="{{ route('vcards.index') }}">{{ __('messages.common.back') }}</a>
                </div>

                <div class="col-12">
                    @include('layouts.errors')
                </div>
                <div class="card">
                    <div class="card-body">
                        {{ Form::hidden('is_true', Request::query('part') == 'business_hours',['id' => 'vcardCreateEditIsTrue']) }}
                        {!! Form::open(['route' => 'vcards.store','files' => 'true']) !!}
                        @include('vcards.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

