@extends('layouts.app')
@section('title')
    {{__('messages.role.new_role')}}
@endsection
@section('header_toolbar')
    <div class="toolbar" >
        <div  class="container-fluid d-flex flex-stack">
            <div

                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            <div class="d-flex align-items-center py-1 ms-auto">
                <a href="{{ route('roles.index') }}"
                   class="btn btn-sm btn-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="post d-flex flex-column-fluid mt-15">
        <div class="d-flex flex-column flex-lg-row">
            <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.errors')
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-12">
                        {!! Form::open(['route' => 'roles.store']) !!}
                        @include('roles.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
