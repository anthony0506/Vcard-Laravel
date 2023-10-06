@extends('front.layouts.app')
@section('title')
    {{ __('messages.vcard.privacy_policy') }}
@endsection
@section('content')
    <section >
        <div class="container p-t-100 padding-top-0">
            <div class="mt-100 px-2">{!! $setting['privacy_policy'] !!}</div>
        </div>
    </section>
@endsection
