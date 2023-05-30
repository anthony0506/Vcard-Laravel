@extends('layouts.app')
@section('title')
    {{ __('messages.translation_manager') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end mb-5">
                    <h1>@yield('title')</h1>
                    <a class="btn btn-outline-primary float-end"
                       href="{{ route('languages.index') }}">{{ __('messages.common.back') }}</a>
                </div>

                <div class="col-12">
                    @include('flash::message')
                </div>
                <div class="card">
                    <div class="card-body">
                        {{ Form::hidden('selected_lang', $selectedLang, ['id' => 'indexSelectedLang']) }}
                        {{ Form::hidden('language_id', $id, ['id' => 'indexLanguageId']) }}
                        {{ Form::open(['route' => ['languages.translation.update','language'=> $id],'method'=>'post', 'data-turbo' => "false"]) }}
                        @include('sadmin.languages.translation-manager.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
