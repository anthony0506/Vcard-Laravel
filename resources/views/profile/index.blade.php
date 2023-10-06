@extends('layouts.app')
@section('title')
    {{ __('messages.user.profile_details') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                @include('layouts.errors')
                @include('flash::message')
                <div class="card">
                    <form id="userProfileEditForm" method="POST"
                          action="{{ route('update.profile.setting') }}"
                          class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body pb-0">
                            <div class="row mb-6">
                                <label class="col-lg-4 form-label required">{{ __('messages.user.avatar').':' }}</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <div class="d-block">
                                        <div class="image-picker">
                                            <div class="image previewImage" id="exampleInputImage"
                                                 style="background-image: url('{{ !empty($user->profile_image) ? $user->profile_image : asset('web/media/avatars/150-26.jpg') }}')">
                                            </div>
                                            <span class="picker-edit rounded-circle text-gray-500 fs-small" title="edit">
                                            <label>
                                                <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                                <input type="file" id="profile_image" name="profile" class="image-upload d-none" accept="image/*"/>
                                            </label>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 form-label">{{ __('messages.user.full_name').':' }}</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            {!! Form::text('first_name', $user->first_name, ['class'=> 'form-control', 'placeholder' => __('messages.form.first_name'), 'required', 'id' => 'editProfileFirstName']) !!}
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            {!! Form::text('last_name', $user->last_name, ['class'=> 'form-control', 'placeholder' => __('messages.form.last_name'), 'required', 'id' => 'editProfileLastName']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 form-label required">{{ __('messages.user.email').':' }}</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    {!! Form::email('email', $user->email, ['class'=> 'form-control', 'placeholder' => __('messages.user.email'), 'required', 'id' => 'isEmailEditProfile']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <label
                                    class="col-lg-4 form-label required">{{ __('messages.user.contact_number').':' }}</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    {{ Form::tel('contact', isset($user)?  (isset($user->region_code) ? '+'.$user->region_code.''.$user->contact : $user->contact) :null, ['class' => 'form-control', 'placeholder' => __('messages.form.contact'), 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber']) }}
                                    {{ Form::hidden('region_code',isset($user) ? $user->region_code : null,['id'=>'prefix_code']) }}
                                    <span id="valid-msg" class="text-success d-none fw-400 fs-small mt-2">{{__('messages.placeholder.valid_number')}}</span>
                                    <span id="error-msg" class="text-danger d-none fw-400 fs-small mt-2">Invalid Number</span>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex">
                            {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
                            @role(\App\Models\Role::ROLE_ADMIN)
                            <a href="{{route('admin.dashboard')}}"
                               class="btn btn-secondary">{{__('messages.common.discard')}}</a>
                            @endrole
                            @role(\App\Models\Role::ROLE_SUPER_ADMIN)
                            <a href="{{route('sadmin.dashboard')}}"
                               class="btn btn-secondary">{{__('messages.common.discard')}}</a>
                            @endrole
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
