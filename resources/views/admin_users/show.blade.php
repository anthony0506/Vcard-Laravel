@extends('layouts.app')
@section('title')
    {{ __('messages.user.admin_details') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
                @if($user->email != 'sadmin@vcard.com')
                    <a href="{{ route('admins.edit', $user->id) }}">
                        <button type="button" class="btn btn-primary me-4">{{__('messages.common.edit')}}</button>
                    </a>
                @endif
                <a href="{{ route('admins.index') }}">
                    <button type="button"
                            class="btn btn-outline-primary float-end">{{__('messages.common.back')}}</button>
                </a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('admin_users.show_fields')
        </div>
    </div>
@endsection

