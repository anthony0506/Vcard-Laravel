@extends('layouts.app')
@section('title')
    {{__('messages.plan.edit_plan')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end mb-5">
                    <h1>{{__('messages.plan.edit_plan')}}</h1>
                    <a class="btn btn-outline-primary float-end"
                       href="{{ route('plans.index') }}">{{ __('messages.common.back') }}</a>
                </div>

                <div class="col-12">
                    @include('layouts.errors')
                </div>
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => ['plans.update', $plan->id], 'method' => 'put', 'id' => 'planForm']) !!}
                        @include('sadmin.plans.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
