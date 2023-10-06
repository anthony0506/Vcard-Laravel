@extends('layouts.app')
@section('title')
    {{__('messages.roles')}}
@endsection
@section('content')
    <div class="post flex-column-fluid">
            @include('flash::message')
        <div class="card">
            <div class="card-header d-flex border-0 pt-6">
                @include('layouts.search-component')
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end">
                        <a type="button" class="btn btn-primary" href="{{ route('roles.create')}}">
                                <span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
														<rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
														<rect fill="#000000" opacity="0.5"
                                                              transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)"
                                                              x="4" y="11" width="16" height="2" rx="1"/>
													</svg>
												</span>
                            {{__('messages.role.new_role')}}</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                @include('roles.table')
                @include('layouts.templates.actions')
            </div>
        </div>
    </div>
@endsection

