<html lang="en">
<head>
    <link>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>{{ getAppName() }}</title>
    <link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">


    {{--css link--}}
    @if(isset($privacyPolicy))
    @if($privacyPolicy->vcard->template_id == 1)
        <link rel="stylesheet" href="{{ asset('assets/css/vcard1.css')}}">
    @elseif($privacyPolicy->vcard->template_id == 2)
        <link rel="stylesheet" href="{{ asset('assets/css/vcard2.css')}}">
    @elseif($privacyPolicy->vcard->template_id == 3)
        <link rel="stylesheet" href="{{ asset('assets/css/vcard3.css')}}">
    @elseif($privacyPolicy->vcard->template_id == 4)
        <link rel="stylesheet" href="{{ asset('assets/css/vcard4.css')}}">
    @elseif($privacyPolicy->vcard->template_id == 5)
        <link rel="stylesheet" href="{{ asset('assets/css/vcard5.css')}}">
    @elseif($privacyPolicy->vcard->template_id == 6)
        <link rel="stylesheet" href="{{ asset('assets/css/vcard6.css')}}">
    @elseif($privacyPolicy->vcard->template_id == 7)
        <link rel="stylesheet" href="{{ asset('assets/css/vcard7.css')}}">
    @elseif($privacyPolicy->vcard->template_id == 8)
        <link rel="stylesheet" href="{{ asset('assets/css/vcard8.css')}}">
    @elseif($privacyPolicy->vcard->template_id == 9)
        <link rel="stylesheet" href="{{ asset('assets/css/vcard9.css')}}">
    @elseif($privacyPolicy->vcard->template_id == 10)
        <link rel="stylesheet" href="{{ asset('assets/css/vcard10.css')}}">
    @endif
    @endif
    @if(isset($termCondition))
        @if($termCondition->vcard->template_id == 1)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard1.css')}}">
        @elseif($termCondition->vcard->template_id == 2)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard2.css')}}">
        @elseif($termCondition->vcard->template_id == 3)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard3.css')}}">
        @elseif($termCondition->vcard->template_id == 4)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard4.css')}}">
        @elseif($termCondition->vcard->template_id == 5)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard5.css')}}">
        @elseif($termCondition->vcard->template_id == 6)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard6.css')}}">
        @elseif($termCondition->vcard->template_id == 7)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard7.css')}}">
        @elseif($termCondition->vcard->template_id == 8)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard8.css')}}">
        @elseif($termCondition->vcard->template_id == 9)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard9.css')}}">
        @elseif($termCondition->vcard->template_id == 10)
            <link rel="stylesheet" href="{{ asset('assets/css/vcard10.css')}}">
        @endif
    @endif
{{--    <link rel="stylesheet" href="{{ asset('assets/css/custom-vcard.css') }}">--}}
    {{--slick slider--}}
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">

    {{--google font--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
<div class="container">
    <div class="
        @if(isset($privacyPolicy))
         @if($privacyPolicy->vcard->template_id == 1)
            main-content mx-auto content-blur vcard-one
@elseif($privacyPolicy->vcard->template_id == 2)
            main-content mx-auto content-blur vcard-two
@elseif($privacyPolicy->vcard->template_id == 3)
            main-content mx-auto content-blur vcard-three
@elseif($privacyPolicy->vcard->template_id == 4)
            main-content mx-auto content-blur vcard
@elseif($privacyPolicy->vcard->template_id == 5)
            main-section  main-section-vcard5
@elseif($privacyPolicy->vcard->template_id == 6)
            main-section-vcard6  main-section d-flex justify-content-center
@elseif($privacyPolicy->vcard->template_id == 7)
            main-section-vcard7 main-section d-flex justify-content-center
@elseif($privacyPolicy->vcard->template_id     == 8)
            main-content mx-auto content-blur vcard-eight
@elseif($privacyPolicy->vcard->template_id == 9)
            vcard-nine main-content w-100 mx-auto content-blur terms-policies-section
@elseif($privacyPolicy->vcard->template_id == 10)
            vcard-ten main-content w-100 mx-auto
@endif
    @endif
    @if(isset($termCondition))
    @if($termCondition->vcard->template_id == 1)
            main-content mx-auto content-blur vcard-one
@elseif($termCondition->vcard->template_id == 2)
            main-content mx-auto content-blur vcard-two
@elseif($termCondition->vcard->template_id == 3)
            main-content mx-auto content-blur vcard-three
@elseif($termCondition->vcard->template_id == 4)
            main-content mx-auto content-blur vcard
@elseif($termCondition->vcard->template_id == 5)
            main-section  main-section-vcard5
@elseif($termCondition->vcard->template_id == 6)
            main-section-vcard6  main-section d-flex justify-content-center
@elseif($termCondition->vcard->template_id == 7)
            main-section-vcard7 main-section d-flex justify-content-center
@elseif($termCondition->vcard->template_id     == 8)
            main-content mx-auto content-blur vcard-eight
@elseif($termCondition->vcard->template_id == 9)
            vcard-nine main-content w-100 mx-auto content-blur terms-policies-section
@elseif($termCondition->vcard->template_id == 10)
            vcard-ten main-content w-100 mx-auto
@endif
    @endif
            ">
        <div class="
          @if(isset($privacyPolicy))
@if($privacyPolicy->vcard->template_id == 1)
                py-5 vcard-one__contact
@elseif($privacyPolicy->vcard->template_id == 2)
                py-5 vcard-two__contact
@elseif($privacyPolicy->vcard->template_id == 3)
                py-5 vcard-three__contact
@elseif($privacyPolicy->vcard->template_id == 4)
                py-5 vcard__contact-us
@elseif($privacyPolicy->vcard->template_id == 5)
                main-bg vcard-five__contact py-5
@elseif($privacyPolicy->vcard->template_id == 6)
                main-bg vcard-six__contact py-5
@elseif($privacyPolicy->vcard->template_id == 7)
                main-bg vcard-seven__contact py-5
@elseif($privacyPolicy->vcard->template_id == 8)
                py-5 vcard-eight__contact
@elseif($privacyPolicy->vcard->template_id == 9)
                main-bg vcard-nine__contact py-5
@elseif($privacyPolicy->vcard->template_id == 10)
                vcard-ten__contact py-5
@endif
        @endif
        @if(isset($termCondition))
        @if($termCondition->vcard->template_id == 1)
                py-5 vcard-one__contact
@elseif($termCondition->vcard->template_id == 2)
                py-5 vcard-two__contact
@elseif($termCondition->vcard->template_id == 3)
                py-5 vcard-three__contact
@elseif($termCondition->vcard->template_id == 4)
                py-5 vcard__contact-us
@elseif($termCondition->vcard->template_id == 5)
                main-bg vcard-five__contact py-5
@elseif($termCondition->vcard->template_id == 6)
                main-bg vcard-six__contact py-5
@elseif($termCondition->vcard->template_id == 7)
                main-bg vcard-seven__contact py-5
@elseif($termCondition->vcard->template_id == 8)
                py-5 vcard-eight__contact
@elseif($termCondition->vcard->template_id == 9)
                main-bg vcard-nine__contact py-5
@elseif($termCondition->vcard->template_id == 10)
                vcard-ten__contact py-5
@endif
        @endif">

            @if(!empty($privacyPolicy->privacy_policy))
                <div class="container">
                    <h4 class="text-center py-4 heading-title
        @if($privacyPolicy->vcard->template_id == 1)
                            vcard-one-heading
@elseif($privacyPolicy->vcard->template_id == 2)
                            vcard-two-heading
@elseif($privacyPolicy->vcard->template_id == 3)
                            vcard-three-heading
@elseif($privacyPolicy->vcard->template_id == 4)
                            vcard__heading
@elseif($privacyPolicy->vcard->template_id == 5)
                            contact-heading
@elseif($privacyPolicy->vcard->template_id == 6)
                            vcard-six-heading
@elseif($privacyPolicy->vcard->template_id == 7)
                            vcard-seven-heading
@elseif($privacyPolicy->vcard->template_id == 8)
                            vcard-eight-heading
@elseif($privacyPolicy->vcard->template_id == 9)
                            heading-right
@elseif($privacyPolicy->vcard->template_id == 10)
                            vcard-ten-heading
@endif">{{ __('messages.vcard.privacy_policy') }}</h4>
                    <div class="card px-sm-3 px-4 py-md-5 py-4 m-3">
                        <div class="px-3 ">
                            {!! $privacyPolicy->privacy_policy !!}
                        </div>
                    </div>
                </div>
            @endif
            @if(!empty($termCondition->term_condition))
                <div class="container">
                    <h4 class="text-center py-4 heading-title
                    @if(isset($privacyPolicy))
       @if($privacyPolicy->vcard->template_id == 1)
                            vcard-one-heading
@elseif($privacyPolicy->vcard->template_id == 2)
                            vcard-two-heading
@elseif($privacyPolicy->vcard->template_id == 3)
                            vcard-three-heading
@elseif($privacyPolicy->vcard->template_id == 4)
                            vcard__heading
@elseif($privacyPolicy->vcard->template_id == 5)
                            contact-heading
@elseif($privacyPolicy->vcard->template_id == 6)
                            vcard-six-heading
@elseif($privacyPolicy->vcard->template_id == 7)
                            vcard-seven-heading
@elseif($privacyPolicy->vcard->template_id == 8)
                            vcard-eight-heading
@elseif($privacyPolicy->vcard->template_id == 9)
                            heading-left
@elseif($privacyPolicy->vcard->template_id == 10)
                            vcard-ten-heading
@endif
                    @endif

                    @if(isset($termCondition))
                    @if($termCondition->vcard->template_id == 1)
                            vcard-one-heading
@elseif($termCondition->vcard->template_id == 2)
                            vcard-two-heading
@elseif($termCondition->vcard->template_id == 3)
                            vcard-three-heading
@elseif($termCondition->vcard->template_id == 4)
                            vcard__heading
@elseif($termCondition->vcard->template_id == 5)
                            contact-heading
@elseif($termCondition->vcard->template_id == 6)
                            vcard-six-heading
@elseif($termCondition->vcard->template_id == 7)
                            vcard-seven-heading
@elseif($termCondition->vcard->template_id == 8)
                            vcard-eight-heading
@elseif($termCondition->vcard->template_id == 9)
                            heading-left
@elseif($termCondition->vcard->template_id == 10)
                            vcard-ten-heading
@endif
                    @endif
                            "> {!! __('messages.vcard.term_condition') !!}</h4>
                    <div class="card px-sm-3 px-4 py-md-5 py-4 m-3">
                        <div class="px-3 ">
                            {!! $termCondition->term_condition !!}
                        </div>
                    </div>
                </div>
            @endif
            <div class="text-center mt-5">
                <a href="{{route('vcard.show',$alias)}}" class="text-decoration-none px-4 text-white cursor-pointer terms-policies-btn
             @if(isset($privacyPolicy))
       @if($privacyPolicy->vcard->template_id == 1)
                        vcard-one-btn
@elseif($privacyPolicy->vcard->template_id == 2)
                        vcard-two-btn
@elseif($privacyPolicy->vcard->template_id == 3)
                        vcard-three-btn
@elseif($privacyPolicy->vcard->template_id == 4)
                        vcard-four-btn
@elseif($privacyPolicy->vcard->template_id == 5)
                        vcard-five-btn
@elseif($privacyPolicy->vcard->template_id == 6)
                        vcard-six-btn
@elseif($privacyPolicy->vcard->template_id == 7)
                        vcard-seven-btn text-dark
@elseif($privacyPolicy->vcard->template_id == 8)
                        vcard-eight-btn
@elseif($privacyPolicy->vcard->template_id == 9)
                        vcard-nine-btn
@elseif($privacyPolicy->vcard->template_id == 10)
                        vcard-ten-btn
@endif
                @endif

                @if(isset($termCondition))
                @if($termCondition->vcard->template_id == 1)
                        vcard-one-btn
@elseif($termCondition->vcard->template_id == 2)
                        vcard-two-btn
@elseif($termCondition->vcard->template_id == 3)
                        vcard-three-btn
@elseif($termCondition->vcard->template_id == 4)
                        vcard-four-btn
@elseif($termCondition->vcard->template_id == 5)
                        vcard-five-btn
@elseif($termCondition->vcard->template_id == 6)
                        vcard-six-btn
@elseif($termCondition->vcard->template_id == 7)
                        vcard-seven-btn text-dark
@elseif($termCondition->vcard->template_id == 8)
                        vcard-eight-btn
@elseif($termCondition->vcard->template_id == 9)
                        vcard-nine-btn
@elseif($termCondition->vcard->template_id == 10)
                        vcard-ten-btn
@endif
                @endif
                        ">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('backend/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
