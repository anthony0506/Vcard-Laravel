@extends('layouts.auth')
@section('title')
    {{__('messages.common.register')}}
@endsection
@section('content')
    <div class="d-flex flex-column flex-column-fluid align-items-center justify-content-center p-4">
        <div class="col-12 text-center">
            <a href="{{ route('home') }}" class="image mb-7 mb-sm-10">
                <img alt="Logo" src="{{ getLogoUrl() }}" class="img-fluid logo-fix-size">
            </a>
        </div>
        <div class="width-540">
            @include('layouts.errors')
        </div>
        <div class="bg-white rounded-15 shadow-md width-540 px-5 px-sm-7 py-10 mx-auto">
            <h1 class="text-center mb-7">{{__('messages.common.create_an_account')}}</h1>
            <form method="POST"
                  action="{{ request()->input('referral-code') ? route('register').'?referral-code='.request()->input('referral-code') : route('register') }}"
                  id="UserRegisterForm" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-sm-7 mb-4">
                        <label for="formInputFirstName" class="form-label">
                            {{ __('messages.user.first_name').':' }}<span class="required"></span>
                        </label>
                        <input name="first_name" type="text" class="form-control" id="first_name"
                               placeholder=" {{ __('messages.user.first_name') }}"
                               aria-describedby="firstName" value="{{ old('first_name') }}" required>
                    </div>
                    <div class="col-md-6 mb-sm-7 mb-4">
                        <label for="last_name" class="form-label">
                            {{ __('messages.user.last_name').':' }}<span class="required"></span>
                        </label>
                        <input name="last_name" type="text" class="form-control" id="last_name" placeholder=" {{ __('messages.user.last_name') }}"
                               aria-describedby="lastName" required value="{{ old('last_name') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-sm-7 mb-4">
                        <label for="email" class="form-label">
                            {{ __('messages.user.email').':' }}<span class="required"></span>
                        </label>
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder=" {{ __('messages.user.email') }}"
                               value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-sm-7 mb-4">
                        <label for="password" class="form-label">
                            {{ __('messages.user.password').':' }}<span class="required"></span>
                        </label>
                        <div class="mb-3 position-relative">
                            <input type="password" name="password" class="form-control" id="password" placeholder=" {{ __('messages.user.password') }}" aria-describedby="password" required aria-label="Password" data-toggle="password">
                            <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                                <i class="bi bi-eye-slash-fill"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-sm-7 mb-4">
                        <label for="password_confirmation" class="form-label">
                            {{ __('messages.user.confirm_password').':' }}<span class="required"></span>
                        </label>
                        <div class="mb-3 position-relative">
                            <input name="password_confirmation" type="password" class="form-control" placeholder=" {{ __('messages.user.confirm_password') }}" id="password_confirmation" aria-describedby="confirmPassword" required aria-label="Password" data-toggle="password">
                            <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                                <i class="bi bi-eye-slash-fill"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-sm-7 mb-4">
                    <div class="form-check">
                        <input type="checkbox" name="term_policy_check" class="form-check-input" id="privacyPolicyCheckbox" placeholder>
                        <label class="form-check-label" for="remember">
                            @lang('messages.by_signing_up_you_agree_to_our')
                            @if(getSuperAdminSettingValue('is_front_page') == 1)
                                <a href="{{ route('terms.conditions') }}"
                                   target="_blank"
                                   class="text-decoration-none link-info fs-6">{!! __('messages.vcard.term_condition') !!}</a>
                                &
                                <a href="{{ route('privacy.policy') }}"
                                   target="_blank"
                                   class="text-decoration-none link-info fs-6">{{ __('messages.vcard.privacy_policy') }}</a>
                                .
                            @else
                                {!! __('messages.vcard.term_condition') !!} & {{ __('messages.vcard.privacy_policy') }}
                            @endif
                        </label>
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">{{ __('messages.common.submit') }}</button>
                </div>
                <div class="d-flex align-items-center mt-4">
                    <span class="text-gray-700 me-2">{{__('messages.common.already_have_an_account').'?'}}</span>
                    <a href="{{ route('login') }}" class="link-info fs-6 text-decoration-none">
                        {{__('messages.common.sign_in_here')}}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

