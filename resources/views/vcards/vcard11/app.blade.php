<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InfyOm Vcard | @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
    <link href="{{ asset('assets/css/layout.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css">
    @yield('page_css')
</head>

<body id="body">
<div class="main-bg">
    @include('vcards.vcard11.header')
    @yield('content')
</div>
<!-- end tab-content-section -->

<script src="{{ asset('assets/js/vcard11/jquery.min.js') }}"></script>
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
        $(document).click(function (event) {
            if (!$(event.target).is('.dropbtn')) {
                $('.dropdown-content').removeClass('show')
            }
        })
    })
</script>

<script>
    $(document).ready(function () {
        $('.sharedropbtn').click(function () {
            $('.sharedropdown-content').toggleClass('activetab')
        })
        $(document).click(function (event) {
            if (!$(event.target).is('.sharedropbtn')) {
                $('.sharedropdown-content').removeClass('activetab')
            }
        })
    })
</script>
</body>

</html>
