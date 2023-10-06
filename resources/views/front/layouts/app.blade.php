<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(!empty($metas))
        @if($metas['meta_description'])
            <meta name="description" content="{{$metas['meta_description']}}">
        @endif
        @if($metas['meta_keyword'])
            <meta name="keywords" content="{{$metas['meta_keyword']}}">
        @endif
        @if($metas['home_title'] && $metas['site_title'])
            <title>{{ $metas['home_title'] }} | {{ $metas['site_title'] }}</title>
        @else
            <title>@yield('title') | {{ getAppName() }}</title>
        @endif
    @else
        <title>@yield('title') | {{ getAppName() }}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
    @endif

    @if(!empty(getAppLogo()))
        <meta property="og:image" content="{{getAppLogo()}}"/>
    @endif

    <link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="{{ mix('assets/css/public.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
    <link href="{{ asset('assets/css/front-custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/front/front-custom.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ mix('assets/js/front-third-party.js') }}"></script>
    <script src="{{ asset('assets/js/messages.js') }}"></script>
    @php  $langSession = Session::get('languageName');
           $frontLanguage = !isset($langSession) ? getSuperAdminSettingValue('default_language') : $langSession;
    @endphp
    <script>
        let frontLanguage = "{{ $frontLanguage }}"
        Lang.setLocale(frontLanguage)
    </script>
    <script src="{{ mix('assets/js/front-pages.js') }}"></script>

    {!! getSuperAdminSettingValue('extra_js_front') !!}
    @routes
    {{--@yield('page_js')--}}
    {{--@yield('scripts')--}}
    <!-- <script>
        $('html, body').animate({
            scrollTop: $('html, body').offset().top,
        })
    </script> -->
    <!--google analytics code-->
    @if(!empty($metas['google_analytics']))
        
            {!! $metas['google_analytics'] !!}
        
    @endif
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <style>
        /* .swiper-button-prev, .swiper-button-next {
            background: white;
            padding: 10px;
            border-radius: 50% 50%;
            width: 80px;
            height: 80px;
        }

        .swiper-button-next:after, .swiper-button-prev:after {
            font-size: 20px;
        } */
    </style>
</head>

<body data-bs-offset="71">
<!-- start header section -->
@include('front.layouts.header')
@yield('content')
@include('front.layouts.footer')

<script>
    var perfEntries = performance.getEntriesByType("navigation");

    if (perfEntries[0].type === "back_forward") {
        location.reload();
        window.scrollTo(0, 0);
    }

    document.addEventListener("DOMContentLoaded", function() {
        window.scrollTo(0, 0);
        // Code to execute after the initial HTML document has been completely loaded and parsed
        var currentURL = window.location.href;
        console.log("currentURL", currentURL)
        const target = document.querySelector(`a[href="${currentURL}"]`);
        console.log("target", target)
        if (target && currentURL.includes('#')) {
            target.click();
        }
    });

    $(document).ready(function() {
        try{
            const monthlyRadio = document.getElementById('monthly');
            const yearlyRadio = document.getElementById('yearly');
            
            const yearlyPlans = document.getElementsByClassName('yearly-plans');
            const monthlyPlans = document.getElementsByClassName('monthly-plans');
          
            if ($('#monthly').is(':checked')) {
                $('.monthly-plans').removeClass("d-none");
                $('.yearly-plans').addClass("d-none");
            } else {
                $('.monthly-plans').addClass("d-none");
                $('.yearly-plans').removeClass("d-none");
            }
            
            monthlyRadio.addEventListener('change', function() {
                if (monthlyRadio.checked) {
                    if ( $('.monthly-plans').hasClass("d-none") ) {
                        $('.monthly-plans').removeClass("d-none");
                    }
                    
                    $('.yearly-plans').addClass("d-none");
                    console.log('Monthly radio button is checked');
                } else {
                    $('.monthly-plans').addClass("d-none");
                    console.log('Monthly radio button is not checked');
                }
            });

            yearlyRadio.addEventListener('change', function() {
                if (yearlyRadio.checked) {
                    if ( $('.yearly-plans').hasClass("d-none") ) {
                        $('.yearly-plans').removeClass("d-none");
                    }
                    
                    $('.monthly-plans').addClass("d-none");
                    console.log('Yearly radio button is checked');
                } else {
                    $('.yearly-plans').addClass("d-none");
                    console.log('Yearly radio button is not checked');
                }
            });
        }catch(e) {

        }
    })

    window.addEventListener('scroll', function(event) {
        if (window.scrollY > 0)
            $('#header').addClass('fixed scrolled');
    })
</script>
</body>
</html>
