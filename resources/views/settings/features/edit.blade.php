@extends('layouts.app')
@section('title')
    {{__('messages.feature.edit_feature')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
                <a href="{{ route('features.index') }}"
                   class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.errors')
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => ['features.update', $feature->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                        @include('settings.features.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
@endsection
