<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    @if(checkFeature('seo'))
        @if($vcard->meta_description)
            <meta name="description" content="{{$vcard->meta_description}}">
        @endif
        @if($vcard->meta_keyword)
            <meta name="keywords" content="{{$vcard->meta_keyword}}">
        @endif
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(checkFeature('seo') && $vcard->site_title && $vcard->home_title)
        <title>{{ $vcard->home_title }} | {{ $vcard->site_title }}</title>
    @else
        <title>{{ $vcard->name }} | {{ getAppName() }}</title>
    @endif
<!-- Favicon -->
    <link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
	      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
	      crossorigin="anonymous" referrerpolicy="no-referrer"/>
	<link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
	<link href="{{ asset('assets/css/layout.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/custom-vcard.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">

	@yield('page_css')
	{{--google font--}}
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	@if(checkFeature('custom-fonts') && $vcard->font_family)
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family={{$vcard->font_family}}">
	@endif
	@if($vcard->font_family || $vcard->font_size || $vcard->custom_css)
		<style>
            @if(checkFeature('custom-fonts'))
                @if($vcard->font_family)
                    body {
                font-family: {{$vcard->font_family}};
            }

            @endif
                @if($vcard->font_size)
                    div > h4 {
                font-size: {{$vcard->font_size}}px !important;
            }
            @endif
            @endif

            @if(isset(checkFeature('advanced')->custom_css))
                {!! $vcard->custom_css !!}
            @endif
        </style>
    @endif
</head>

<body id="body">
@include('vcards.password')
<div class="main-bg">
    @include('vcardTemplates.vcard11.header')
    @yield('content')
</div>
@include('vcardTemplates.template.templates')
<!-- end tab-content-section -->
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('assets/js/vcard11/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/front-third-party-vcard11.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>
@yield('page_js')
<script>
    $('.counter').each(function () {
        var $this = $(this),
            countTo = $this.attr('data-countto')
        countDuration = parseInt($this.attr('data-duration'))
        $({ counter: $this.text() }).animate(
            {
                counter: countTo,
            },
            {
                duration: countDuration,
                easing: 'linear',
                step: function () {
                    $this.text(Math.floor(this.counter))
                },
                complete: function () {
                    $this.text(this.counter)
                },
            },
        )
    })
</script>

<script>
    $('.slick-slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        arrows: true,
        prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-chevron-left"></i></button>',
        nextArrow: '<button class="slide-arrow next-arrow"><i class="fa-solid fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    })

</script>
<script>
    function openbars () {
        document.getElementById('v-pills-tab').style.display = 'none'
        document.getElementById('pages-menu').style.display = 'block'
    }

    function closebars () {
        document.getElementById('v-pills-tab').style.display = 'block'
        document.getElementById('pages-menu').style.display = 'none'
    }

    function openbars1 () {
        document.getElementById('v-pills-tab1').style.display = 'none'
        document.getElementById('pages-menu1').style.display = 'block'
    }

    function closebars1 () {
        document.getElementById('v-pills-tab1').style.display = 'block'
        document.getElementById('pages-menu1').style.display = 'none'
    }
</script>

<script>
    $(document).ready(function () {
        $('.dropbtn').click(function () {
            $('.dropdown-content').toggleClass('show')
        })
        // $(document).click(function (event) {
        //     if (!$(event.target).is('.dropbtn')) {
        //         $('.dropdown-content').removeClass('show')
        //     }
        // })
    })
</script>

<script>
    $(document).ready(function () {
        $('.sharedropdown .sharedropbtn').click(function () {
            $('.sharedropdown-content').toggleClass('activetab')
        })
    })
</script>
<script>
    let isEdit = false
    let password = "{{isset(checkFeature('advanced')->password) && !empty($vcard->password) }}"
    let passwordUrl = "{{ route('vcard.password', $vcard->id) }}"
    let enquiryUrl = "{{ route('enquiry.store', ['vcard' => $vcard->id, 'alias' => $vcard->url_alias]) }}"
    let appointmentUrl = "{{ route('appointment.store.vcard11', ['vcard' => $vcard->id, 'alias' => $vcard->url_alias]) }}"

    let paypalUrl = "{{ route('paypal.init') }}"
    let slotUrl = "{{route('appointment-session-time',$vcard->url_alias)}}"
    let appUrl = "{{ config('app.url') }}"
    let vcardId = {{$vcard->id}};
    let vcardAlias = "{{$vcard->url_alias}}"
    let languageChange = "{{ url('language') }}"
    let lang = "{{checkLanguageSession($vcard->url_alias)}}"
    let template = 'vcard11'
    let passwordSet = "{{ Session::get('password_') }}"
    let stripe = '';
    @if (!empty($userSetting['stripe_key']))
    stripe = Stripe('{{ $userSetting['stripe_key'] }}');
    @endif
</script>
<script>
    const svg = document.getElementsByTagName('svg')[0]
    const blob = new Blob([svg.outerHTML], { type: 'image/svg+xml' })
    const url = URL.createObjectURL(blob)
    const image = document.createElement('img')
    image.src = url
    image.addEventListener('load', () => {
        const canvas = document.createElement('canvas')
        canvas.width = canvas.height = {{ $vcard->qr_code_download_size }};
        const context = canvas.getContext('2d')
        context.drawImage(image, 0, 0, canvas.width, canvas.height);
        const link = document.getElementById('qr-code-btn')
        link.href = canvas.toDataURL()
        URL.revokeObjectURL(url)
    })
</script>
@routes
<script src="{{ asset('assets/js/messages.js') }}"></script>
<script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
<script src="{{ mix('assets/js/vcards/vcard-view.js') }}"></script>
<script src="{{ mix('assets/js/lightbox.js') }}"></script>
</body>

</html>
