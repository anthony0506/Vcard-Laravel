@extends('vcards.vcard11.app')
@section('title')
    Home
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('page_name')
    About
@endsection
@section('content')
    <div class="tab-content p-sm-4 p-3" id="v-pills-tabContent">
        <div class="home-tab tab-pane fade show active" id="v-pills-home" role="tabpanel"
             aria-labelledby="v-pills-home-tab">
            <div class="hero-about">
                <div class="row">
                    <div class=" col-xl-6">
                        <p class="text-white  mb-1">Web designer</p>
                        <h2 class="text-white fs-34 fw-5 mb-4 d-inline-block">KEVIN ANTONY</h2>
                        <p class="text-white fs-20 mb-2">Description</p>
                        <p class="text-white fs-14 fw-normal">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae sapien porttitor,
                            dignissim quam sit amet, aliquam lorem. Fusce id ligula non risus mollis consectetur. Nam
                            lobortis, erat quis pulvinar dignissim, velit ligula ullamcorper ipsum, at sodales elit odio
                            at velit. Sed a est a quam mattis suscipit. Proin et faucibus diam. Lorem ipsum dolor sit
                            amet, consectetur adipiscing elit. Phasellus vitae sapien porttitor, dignissim quam sit
                            amet, aliquam lorem. Fusce id ligula non risus mollis consectetur. Nam lobortis, erat quis
                            pulvinar dignissim, velit ligula ullamcorper ipsum, at sodales elit odio at velit. Sed a est
                            a quam mattis suscipit.
                        </p>
                    </div>
                    <div class="col-xl-6 ps-3">
                        <div class="desc">
                            <div class=" d-flex mb-2 ">
                                <div class="icon me-4">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="">
                                    <span>Name :</span>
                                    <a class="ps-2 fs-14">KEVIN ANTONY</a>
                                </div>
                            </div>
                            {{--                            <div class=" d-flex mb-2">--}}
                            {{--                                <div class="icon me-4">--}}
                            {{--                                    <i class="fa-solid fa-user"></i>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="">--}}
                            {{--                                    <span>Age:</span>--}}
                            {{--                                    <a href="#!" class="ps-2 fs-14">24</a>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class=" d-flex mb-2">
                                <div class="icon me-4">
                                    <i class="fa-sharp fa-solid fa-location-dot"></i>
                                </div>
                                <div class="">
                                    <span>Address :</span>
                                    <a class="ps-2 fs-14">Ontario,Canada</a>
                                </div>
                            </div>
                            <div class=" d-flex mb-2">
                                <div class="icon me-4">
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <div class="">
                                    <span>Date of birth :</span>
                                    <a class="ps-2 fs-14">17 August 1994</a>
                                </div>
                            </div>
                            <div class=" d-flex mb-2">
                                <div class="icon me-4">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="">
                                    <span>Contact :</span>
                                    <a href="#!" class="ps-2 fs-14">+76 6524 567862 763</a>
                                </div>
                            </div>
                            {{--                            <button type="button" class="btn btn-primary fs-14 mt-3">MY PORTFOLIO<i--}}
                            {{--                                        class="fa-solid fa-arrow-right text-white ms-3"></i></button>--}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- start services section -->
            <section class="services-section pt-30 pb-30">
                <div class="section-heading mb-40">
                    <h2 class="fs-22 text-white ps-4">{{__('messages.services')}}</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-sm-5 mb-4">
                        <div class="card flex-sm-row p-sm-4 p-3 h-100">
                            <div class="tag d-flex justify-content-center align-items-center mb-4">
                                <span class="fs-6 text-white">01</span>
                            </div>
                            <div class="card-img-top">
                                <i class="fa-solid fa-desktop"></i>
                            </div>
                            <div class="card-body p-0 ps-sm-4 pt-sm-0 pt-3">
                                <h5 class="card-title fs-18">Web Design</h5>
                                <p class="card-text fs-14 pb-4 mb-0">
                                    Praesent nec leo venenatis elit semper aliquet id ac enim. Maecenas nec mi leo.
                                    Etiam venenatis ut dui non hendrerit. Integer dictum, diam vitae blandit accumsan,
                                    dolor odio tempus arcu .
                                </p>
                                {{--                                <div class="d-flex flex-wrap pt-3">--}}
                                {{--                                    <span class="fs-12 text-white me-3">CODE</span>--}}
                                {{--                                    <span class="fs-12 text-white me-3">DESIGN</span>--}}
                                {{--                                    <span class="fs-12 text-white ">PHOTOSHOP</span>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-sm-5 mb-4">
                        <div class="card flex-sm-row p-sm-4 p-3 h-100">
                            <div class="tag d-flex justify-content-center align-items-center">
                                <span class="fs-6 text-white">02</span>
                            </div>
                            <div class="card-img-top">
                                <i class="fa-brands fa-pagelines"></i>
                            </div>
                            <div class="card-body p-0 ps-sm-4 pt-sm-0 pt-3">
                                <h5 class="card-title fs-18">Branding</h5>
                                <p class="card-text fs-14 pb-4 mb-0">
                                    Praesent nec leo venenatis elit semper aliquet id ac enim. Maecenas nec mi leo.
                                    Etiam venenatis ut dui non hendrerit. Integer dictum, diam vitae blandit accumsan,
                                    dolor odio tempus arcu.
                                </p>
                                {{--                                <div class="d-flex flex-wrap pt-3">--}}
                                {{--                                    <span class="fs-12 text-white me-3">LOGOS</span>--}}
                                {{--                                    <span class="fs-12 text-white me-3">DESIGN</span>--}}
                                {{--                                    <span class="fs-12 text-white ">CONCEPT</span>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-md-0 mb-sm-5 mb-4">
                        <div class="card flex-sm-row p-sm-4 p-3 h-100">
                            <div class="tag d-flex justify-content-center align-items-center">
                                <span class="fs-6 text-white">03</span>
                            </div>
                            <div class="card-img-top">
                                <i class="fa-solid fa-mobile-screen"></i>
                            </div>
                            <div class="card-body p-0 ps-sm-4 pt-sm-0 pt-3">
                                <h5 class="card-title fs-18">UI/UX Design</h5>
                                <p class="card-text fs-14 pb-4 mb-0">
                                    Praesent nec leo venenatis elit semper aliquet id ac enim. Maecenas nec mi leo.
                                    Etiam venenatis ut dui non hendrerit. Integer dictum, diam vitae blandit accumsan,
                                    dolor odio tempus arcu.
                                </p>
                                {{--                                <div class="d-flex flex-wrap pt-3">--}}
                                {{--                                    <span class="fs-12 text-white me-3">COMMERCIALS</span>--}}
                                {{--                                    <span class="fs-12 text-white me-3">PERSONAL</span>--}}
                                {{--                                    <span class="fs-12 text-white ">STORE</span>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card flex-sm-row p-sm-4 p-3 h-100">
                            <div class="tag d-flex justify-content-center align-items-center">
                                <span class="fs-6 text-white">04</span>
                            </div>
                            <div class="card-img-top">
                                <i class="fa-solid fa-camera"></i>
                            </div>
                            <div class="card-body p-0 ps-sm-4 pt-sm-0 pt-3">
                                <h5 class="card-title fs-18">Photography</h5>
                                <p class="card-text fs-14 pb-4 mb-0">
                                    Praesent nec leo venenatis elit semper aliquet id ac enim. Maecenas nec mi leo.
                                    Etiam venenatis ut dui non hendrerit. Integer dictum, diam vitae blandit accumsan,
                                    dolor odio tempus arcu .
                                </p>
                                {{--                                <div class="d-flex flex-wrap pt-3">--}}
                                {{--                                    <span class="fs-12 text-white me-3">COMMERCIALS</span>--}}
                                {{--                                    <span class="fs-12 text-white me-3">WEDDINGS</span>--}}
                                {{--                                    <span class="fs-12 text-white ">PORTRAITS</span>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end services section -->

            <!-- start services section -->
            <section class="services-section pt-30  ">
                <div class="section-heading mb-40">
                    <h2 class="fs-22 text-white ps-4">{{__('messages.feature.products')}}</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-sm-4 mb-4">
                        <div class="card flex-sm-row p-sm-4 p-3 h-100">
                            <div class="tag d-flex justify-content-center align-items-center">
                                <span class="fs-6 text-white">01</span>
                            </div>
                            <div class="card-img-top">
                                <img src="{{asset('assets/img/vcard1/v2.jpg')}}" alt="profile" class="w-100" width="56"
                                     height="50"/>
                            </div>
                            <div class="card-body p-0 ps-sm-4 pt-sm-0 pt-3">
                                <h5 class="card-title fs-18">Laptop</h5>
                                <p class=" fs-14 pb-4 mb-0">
                                    $200
                                </p>
                                <p class="card-text fs-14 pb-4 mb-0">
                                    DELL Inspiron Core i3 11th Gen
                                </p>
                                {{--                                <div class="d-flex flex-wrap pt-3">--}}
                                {{--                                    <span class="fs-12 text-white me-3">CODE</span>--}}
                                {{--                                    <span class="fs-12 text-white me-3">DESIGN</span>--}}
                                {{--                                    <span class="fs-12 text-white ">PHOTOSHOP</span>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-sm-4 mb-4">
                        <div class="card flex-sm-row p-sm-4 p-3 h-100">
                            <div class="tag d-flex justify-content-center align-items-center">
                                <span class="fs-6 text-white">02</span>
                            </div>
                            <div class="card-img-top">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" width="56" height="50"/>
                            </div>
                            <div class="card-body p-0 ps-sm-4 pt-sm-0 pt-3">
                                <h5 class="card-title fs-18">Mens's Wear</h5>
                                <p class=" fs-14 pb-4 mb-0">
                                    $150
                                </p>
                                <p class="card-text fs-14 pb-4 mb-0">
                                    Mens Regular Formal Suit.
                                </p>
                                {{--                                <div class="d-flex flex-wrap pt-3">--}}
                                {{--                                    <span class="fs-12 text-white me-3">LOGOS</span>--}}
                                {{--                                    <span class="fs-12 text-white me-3">DESIGN</span>--}}
                                {{--                                    <span class="fs-12 text-white ">CONCEPT</span>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end services section -->


            <!-- start product-section -->
            <section class="testimonials-section position-relative mt-4 ">
                <div class="section-heading ">
                    <h2 class="fs-22 text-white ps-4 mb-0">{{__('messages.feature.testimonials')}}</h2>
                </div>
                <div class="slick-slider">
                    <div class="col element element-1 h-100">
                        <a class="fs-14 ps-3"></a>
                        <div class="card flex-sm-row p-4 me-3 h-100">
                            <div class="tag d-flex justify-content-center align-items-center">
                                <span class="fs-6 text-white">01</span>
                            </div>
                            <div class="card-img-top">
                                <img src="{{ asset('assets/img/vcard11/slider-1.jpeg') }}"
                                     class="w-100 h-100 object-fit-cover">
                            </div>
                            <div class="card-body p-0 ps-sm-4 pt-sm-0 pt-3">
                                <h5 class="card-title fs-18">Liza Mirovsky</h5>
                                <p class="card-text fs-14  mb-0">
                                    "All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as
                                    necessary, making this the first true generator on the Internet. It uses a
                                    dictionary of over "
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col element element-2 h-100">
                        <a class="fs-14 ps-3"></a>
                        <div class="card flex-sm-row p-4 me-3 h-100">
                            <div class="tag d-flex justify-content-center align-items-center">
                                <span class="fs-6 text-white">02</span>
                            </div>
                            <div class="card-img-top">
                                <img src="{{ asset('assets/img/vcard11/slider-2.jpeg') }}"
                                     class="w-100 h-100 object-fit-cover">
                            </div>
                            <div class="card-body p-0 ps-sm-4 pt-sm-0 pt-3">
                                <h5 class="card-title fs-18">Andy Smith</h5>
                                <p class="card-text fs-14  mb-0">
                                    "Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris
                                    non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui.
                                    Nulla auctor sit amet sem non porta."
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col element element-3 h-100">
                        <a class="fs-14 ps-3"></a>
                        <div class="card flex-sm-row me-3 p-4 h-100">
                            <div class="tag d-flex justify-content-center align-items-center">
                                <span class="fs-6 text-white">03</span>
                            </div>
                            <div class="card-img-top">
                                <img src="{{ asset('assets/img/vcard11/slider-3.jpeg') }}"
                                     class="w-100 h-100 object-fit-cover">
                            </div>
                            <div class="card-body p-0 ps-sm-4 pt-sm-0 pt-3">
                                <h5 class="card-title fs-18">Mery Trust</h5>
                                <p class="card-text fs-14  mb-0">
                                    "All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as
                                    necessary, making this the first true generator on the Internet. It uses a
                                    dictionary of over "
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col element element-4 h-100">
                        <a class="fs-14 ps-4"></a>
                        <div class="card flex-sm-row me-3 p-4 h-100">
                            <div class="tag d-flex justify-content-center align-items-center">
                                <span class="fs-6 text-white">04</span>
                            </div>
                            <div class="card-img-top">
                                <img src="{{ asset('assets/img/vcard11/slider-4.jpeg') }}"
                                     class="w-100 h-100 object-fit-cover">
                            </div>
                            <div class="card-body p-0 ps-sm-4 pt-sm-0 pt-3">
                                <h5 class="card-title fs-18">Centa Simpson</h5>
                                <p class="card-text fs-14  mb-0">
                                    "Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris
                                    non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui.
                                    Nulla auctor sit amet sem non porta."
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end testimonials-section -->
            <!-- start client-section -->
            <section class="client-section mt-4">
                <div class="section-heading ">
                    <h2 class="fs-22 text-white ps-4 mb-5 mt-5">{{__('messages.feature.gallery')}}</h2>
                </div>
                <div class="row">
                    <div class="col-md-3 col-6 mb-md-0 mb-4">
                        <div class="client-box w-100 h-100 py-sm-4 py-3">
                            <div class="client-img">
                                <img src="{{ asset('assets/img/vcard11/client-1.png') }}"
                                     class="w-100 h-100 object-fit-cover">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-md-0 mb-4">
                        <div class="client-box w-100 h-100 py-4">
                            <div class="client-img">
                                <img src="{{ asset('assets/img/vcard11/client-2.png') }}"
                                     class="w-100 h-100 object-fit-cover">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="client-box w-100 h-100 py-4">
                            <div class="client-img">
                                <img src="{{ asset('assets/img/vcard11/client-3.png') }}"
                                     class="w-100 h-100 object-fit-cover">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="client-box w-100 h-100 py-4">
                            <div class="client-img">
                                <img src="{{ asset('assets/img/vcard11/client-4.png') }}"
                                     class="w-100 h-100 object-fit-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end client-section -->
        </div>
    </div>
@endsection

