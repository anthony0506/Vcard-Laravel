@extends('front.layouts.app')
@section('title')
    {{ getAppName() }}
@endsection
@section('content')

<style>
#frontContactTab, #frontAboutTab {
    max-width: 1280px;
    margin-left: auto;
    margin-right: auto;
}

.swiper-button-prev, .swiper-button-next {
    background: white;
    padding: 10px;
    border-radius: 50% 50%;
    width: 80px;
    height: 80px;
}

.swiper-button-next:after, .swiper-button-prev:after {
    font-size: 20px;
}
</style>

    <!-- start hero section -->
    <section class="hero-section padding-b-100px" id="frontHomeTab">
        <div class="container">
            <div class="row align-items-center flex-column-reverse flex-lg-row">
                <div class="col-lg-6">
                    <div class="mt-5 hero-content mt-lg-0">
                        <h1>The only vHub</h1>
                        <h1>you'll ever need </h1>
                        <h2>{{ $setting['home_page_title'] }}</h2>
                        <p>{{ $setting['sub_text'] ?? '' }}</p>
                        @if(empty(getLogInUser()))
                            <a class="px-5 mt-4 rounded-md fs-6 btn btn-primary" href="{{ route('register') }}"
                               data-turbo="false">
                                {{ __('auth.get_started') }}
                            </a>
                        @endif
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg watchvideomodal" data-keyboard="false"
                     tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
                        <div class="modal-content home-modal">
                            <div class="modal-header border-0">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <video id="VisaChipCardVideo" class="video-box" controls>
                                <source src="https://www.w3schools.com/html/mov_bbb.mp4"
                                        type="video/mp4">
                                <!--Browser does not support <video> tag -->
                            </video>
                        </div>
                    </div>
                </div>
                <!-- END MODAL -->
                <div class="col-lg-6">
                    <img src="{{ isset($setting['home_page_banner']) ? $setting['home_page_banner'] : asset('front/images/hero.png') }}"
                         alt="Vcard" class="img-fluid image-object-fit-cover"/>
                </div>
            </div>
        </div>
    </section>
    <!-- end hero section -->

    <!-- start features section -->
    <section class="features-section" id="frontFeatureTab">
        <div class="container">
            <h2 class="mb-4 text-center display-6">
                {{__('messages.plan.features')}}
            </h2>
            <div class="w-100" id="carousel" data-interval="false">
                <!-- <div class="carousel__inner carousel-inner" id="carouselInner"> -->
                <div class="swiper sample-slider" style="z-index: 0;">
                    <div class="swiper-wrapper">
                        @php $i = 0; @endphp
                        @foreach($features as $feature)
                        <div class="swiper-slide carousel__item item{{ $i == 0 ? ' active' : '' }}">
                            <div>
                                <div class="rounded-10 features-section__features-inner mx-xxl-2" style="background: linear-gradient(180deg, rgba(0, 163, 83, 0.3) -43%, rgba(0, 163, 83, 0) 128.25%), #FFFFFF;">
                                    <h3 class="mt-4 text-center text-primary fs-4 fw-regular" style="min-height: 67px;">
                                        {{ $feature->name }}
                                    </h3>
                                    <p class="text-center fs-6" style="min-height: 137px;">
                                        {!! $feature->description !!}
                                    </p>
                                    <div class="mb-3 d-flex justify-content-center align-items-center">
                                        <i class="mdi mdi-trophy-variant-outline"></i>
                                        <div class="bg-white" style="border-radius: 50%; height: 5em; width: 5em">
                                            <img src="{{ $feature->profile_image }}" alt="{{ $feature->profile_image }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $i++; @endphp
                        @endforeach
                    </div>

                     <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev shadow shadow-md"></div>
                    <div class="swiper-button-next shadow shadow-md"></div>
                </div>
                    
                <!-- </div> -->
                <!-- <button href="#carousel" class="bg-white shadow carousel__control carousel__control--prev left carousel-control" id="prevButton" data-slide="prev">
                    <span class="carousel__control-icon text-primary">&lt;</span>
                </button>
                <button href="#carousel" class="bg-white shadow carousel__control carousel__control--next right carousel-control" id="nextButton" data-slide="next">
                    <span class="carousel__control-icon text-primary">&gt;</span>
                </button> -->
            </div>
        </div>
    </section>
    <!-- end features section -->

    <!-- start about section -->
    <section class="about-section" id="frontAboutTab">
        <div class="px-0 mx-0 container-fluid">
            <h2 class="mb-4 text-center display-6">
                {{__('auth.modern_&_powerful_interface')}}
            </h2>

            <div class="px-0 mx-0 my-4 row">
                <div class="col d-flex px-0">
                    <img src="{{ isset($aboutUS[0]['about_url']) ? $aboutUS[0]['about_url'] : asset('front/images/about-1.png') }}" alt="about-1.png" style="width: 100%;">
                </div>

                <div class="text-white col-md-6 d-flex bg-dark">
                    <div class="p-5">
                        <h1 class="display-4 fw-bold">
                            {{$aboutUS[0]['title']}}
                        </h1>
                        <p class="mt-4 fw-light">
                            {!! $aboutUS[0]['description'] !!}
                        </p>
                    </div>
                </div>
            </div>

            <div class="px-0 mx-0 my-4 row">
                <div class="text-white col-md-6 d-flex" style="background: #1b503b">
                    <div class="p-5">
                        <h1 class="display-4 fw-bold">
                            {{ $aboutUS[1]['title'] }}
                        </h1>
                        <p class="mt-4 fw-light">
                            {!! $aboutUS[1]['description'] !!}
                        </p>
                    </div>
                </div>

                <div class="col d-flex px-0">
                    <img src="{{ isset($aboutUS[1]['about_url']) ? $aboutUS[1]['about_url'] : asset('front/images/about-2.png') }}" alt="about-2.png" style="width: 100%;">
                </div>
            </div>

            <div class="px-0 mx-0 my-4 row">
                <div class="col d-flex px-0">
                    <img src="{{ isset($aboutUS[2]['about_url']) ? $aboutUS[2]['about_url'] : asset('front/images/about-3.png') }}" alt="about-3.png" style="width: 100%;" />
                </div>

                <div class="text-white col-md-6 d-flex bg-dark">
                    <div class="p-5">
                        <h1 class="display-4 fw-bold">
                            {{ $aboutUS[2]['title']}}
                        </h1>
                        <p class="mt-4 fw-light">
                            {!! $aboutUS[2]['description'] !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->

    <!-- start subscribe section -->
    <section class="p-5 mt-5 text-white bg-dark d-flex flex-column justify-content-center align-items-center"
        id="frontContactTab">
        <h2 class="fs-4">
            {{__('auth.subscribe_here')}}
        </h2>
        <p class="fs-6 fw-lighter">
            {{__('messages.placeholder.receive_latest_news')}}
        </p>
        <a href="#!" class="header-logo">
            <img src="{{ getLogoUrl() }}" alt="Vcard" class="mt-4 img-fluid new-logo-image" />
        </a>
        <form action="{{route('email.sub')}}" method="post" id="addEmail" style="width: 100%;">
            @csrf()
            <div class="subscribe-container mt-4 mb-3 input-group w-50 rounded-0 mx-auto">
                <input name="email" type="email" class="form-control" placeholder="{{ __('messages.front.your_email_address') }}" aria-label="Recipient's username" aria-describedby="button-addon2">

                <button type="submit" class="btn btn-primary" style="z-index: 0;">{{ __('messages.subscribe') }}</button>
            </div>
        </form>
    </section>
    <!-- end subscribe section -->

    <script>
    if(window.innerWidth > 991) {
        const swiper = new Swiper('.sample-slider', {
			direction: 'horizontal',
			centeredSlides: true,
			loop: true, //loop
			slidesPerView: 3, //number of slides to show
			centeredSlides: true, //put acctive slide center
			spaceBetween: 20, //space between slides
			speed: 1000,
			longSwipes: false,
			coverflowEffect: {
				rotate: 0,
				modifier: 1,
				slideShadows: false,
			},
			pagination: { //pagination（dots）
				el: '.swiper-pagination',
			},
			navigation: { //navigation（arrows）
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
		});
    } else if(window.innerWidth > 768) {
        const swiper = new Swiper('.sample-slider', {
			direction: 'horizontal',
			centeredSlides: true,
			loop: true, //loop
			slidesPerView: 2, //number of slides to show
			centeredSlides: true, //put acctive slide center
			spaceBetween: 20, //space between slides
			speed: 1000,
			longSwipes: false,
			coverflowEffect: {
				rotate: 0,
				modifier: 1,
				slideShadows: false,
			},
			pagination: { //pagination（dots）
				el: '.swiper-pagination',
			},
			navigation: { //navigation（arrows）
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
		});
    } else if(window.innerWidth > 505) {
        const swiper = new Swiper('.sample-slider', {
			direction: 'horizontal',
			centeredSlides: true,
			loop: true, //loop
			slidesPerView: 1.6, //number of slides to show
			centeredSlides: true, //put acctive slide center
			spaceBetween: 20, //space between slides
			speed: 1000,
			longSwipes: false,
			coverflowEffect: {
				rotate: 0,
				modifier: 1,
				slideShadows: false,
			},
			pagination: { //pagination（dots）
				el: '.swiper-pagination',
			},
			navigation: { //navigation（arrows）
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
		});
    } else {
        const swiper = new Swiper('.sample-slider', {
			direction: 'horizontal',
			centeredSlides: true,
			loop: true, //loop
			slidesPerView: 1, //number of slides to show
			centeredSlides: true, //put acctive slide center
			spaceBetween: 20, //space between slides
			speed: 1000,
			longSwipes: false,
			coverflowEffect: {
				rotate: 0,
				modifier: 1,
				slideShadows: false,
			},
			pagination: { //pagination（dots）
				el: '.swiper-pagination',
			},
			navigation: { //navigation（arrows）
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
		});
    }    
    </script>
@endsection
