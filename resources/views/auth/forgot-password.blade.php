@extends('layouts.auth')
@section('title')
    {{__('messages.common.forgot_password')}}
@endsection
@section('content')
    <div class="d-flex flex-column flex-column-fluid align-items-center mt-12 p-4">
        <div class="col-12 text-center mt-0">
            <a href="{{ route('home') }}" class="image mb-7 mb-sm-10">
                <img alt="Logo" src="{{ getLogoUrl() }}" class="img-fluid logo-fix-size">
            </a>
        </div>
        <div class="width-540">
            @include('layouts.errors')
            @include('flash::message')
            @if(Session::has('status'))
            <div class="alert alert-success fs-4 text-white align-items-center" role="alert">
                <i class="fa-solid fa-face-smile me-4"></i>
                {{ Session::get('status') }}
            </div>
            @endif
        </div>
        <div class="bg-white rounded-15 shadow-md width-540 px-5 px-sm-7 py-10 mx-auto">
            <h1 class="text-center mb-7">{{__('messages.common.forgot_password').' ?'}}</h1>
            <div class="fw-bold fs-4 mb-5 text-center">{{__('messages.placeholder.enter_your_email_to_reset')}}</div>
            <div class="fs-4 text-center mb-5">{{ __('messages.placeholder.forgot_your_password_no_problem') }}</div>
            <form class="form w-100" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row">
                    <div class="mb-4">
                        <label for="email" class="form-label">
                            {{ __('messages.user.email').':' }}<span class="required"></span>
                        </label>
                        <input id="email" class="form-control" type="email"
                               value="{{ old('email') }}"
                               required autofocus name="email" autocomplete="off" placeholder="{{ __('messages.user.email') }}"/>
                    </div>
                </div>
                <div class="row">
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12 d-flex text-start align-items-center">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label"> {{ __('messages.email_password_reset_link') }}</span>
                        </button>
                        <a href="{{ route('login') }}"
                           class="btn btn-secondary my-0 ms-5 me-0">{{__('messages.common.cancel')}}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

