<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
   <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">

    {{--css link--}}
    <link rel="stylesheet" href="{{ asset('assets/css/vcard3.css')}}">

    {{--slick slider--}}
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">

    {{--google Font--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <title>Vcard3 Theme</title>
</head>
<body>
<div class="container">
    <div class="vcard-three main-content w-100 mx-auto overflow-hidden">
        {{--banner--}}
        <div class="vcard-three__banner w-100 position-relative">
            <img src="{{asset('assets/img/vcard3/vcard3-banner.png')}}" class="img-fluid banner-image" alt="banner"/>

            <div class="d-flex justify-content-end position-absolute top-0 end-0 me-3">
                <div class="language pt-3 me-2">
                    <ul class="text-decoration-none">
                        <li class="dropdown1 dropdown lang-list">
                            <a class="dropdown-toggle lang-head text-decoration-none" data-toggle="dropdown"
                               role="button"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-language me-2"></i>Language</a>
                            <ul class="dropdown-menu start-0 lang-hover-list top-100">
                                <li>
                                    <img src="{{asset('assets/img/vcard1/english.png')}}" width="25px" height="20px"
                                         class="me-3"><a href="#">English</a></li>
                                <li>
                                    <img src="{{asset('assets/img/vcard1/spain.png')}}" width="25px" height="20px"
                                         class="me-3"><a href="#">Spanish</a></li>
                                <li>
                                    <img src="{{asset('assets/img/vcard1/france.png')}}" width="25px" height="20px"
                                         class="me-3"><a href="#">Franch</a></li>
                                <li>
                                    <img src="{{asset('assets/img/vcard1/arabic.svg')}}" width="25px" height="20px"
                                         class="me-3"><a href="#">Arabic</a></li>
                                <li>
                                    <img src="{{asset('assets/img/vcard1/german.png')}}" width="25px" height="20px"
                                         class="me-3"><a href="#">German</a></li>
                                <li>
                                    <img src="{{asset('assets/img/vcard1/russian.jpeg')}}" width="25px" height="20px"
                                         class="me-3"><a href="#">russian</a></li>
                                <li>
                                    <img src="{{asset('assets/img/vcard1/turkish.png')}}" width="25px" height="20px"
                                         class="me-3"><a href="#">Turkish</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{--profile--}}
        <div class="vcard-three__profile position-relative">
            <div class="avatar position-absolute top-0 start-50 translate-middle">
                <img src="{{asset('assets/img/vcard3/vcard3-profile.png')}}" alt="profile-img" class="rounded-circle"/>
            </div>
        </div>
        {{--profile details--}}
        <div class="vcard-three__profile-details py-3 px-3">
            <h4 class="vcard-three-heading text-center">Khushi Patel</h4>
            <span class="profile-designation text-center d-block text-white">a freelancer UI/UX Designer</span>
            <div class="mt-5">
            <span class="profile-description" > I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery</span>
            </div>
            <div class="social-icons d-flex justify-content-center pt-4">
                <i class="fab fa-facebook facebook-icon icon me-sm-4 me-2 fa-2x"></i>
                <i class="fab fa-instagram instagram-icon icon mx-sm-4 mx-3 fa-2x"></i>
                <i class="fab fa-linkedin-in linkedin-icon icon mx-sm-4 mx-3 fa-2x"></i>
                <i class="fab fa-whatsapp whatsapp-icon icon mx-sm-4 mx-3 fa-2x"></i>
                <i class="fab fa-twitter twitter-icon icon ms-sm-4 ms-2 fa-2x"></i>
            </div>
        </div>
        {{--event--}}
        <div class="vcard-three__event py-3 px-3 mt-2 position-relative">
            <img src="{{asset('assets/img/vcard3/vcard3-shape.png')}}" alt="shape" class="position-absolute end-0 shape-one"/>
            <div class="container">
                <div class="row g-3">
                    <div class="col-sm-6 col-12">
                        <div class="card event-card p-2 h-100 border-0 flex-sm-row flex-column align-items-center">
                            <span class="event-icon d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/vcard3/vcard3-email.png')}}" alt="email"/>
                            </span>
                            <div class="event-detail ms-sm-3 mt-sm-0 mt-4">
                                <h6 class="text-white text-sm-start text-center">E-mail address</h6>
                                <h5 class="event-name text-sm-start text-center mb-0 text-white">sly.watson@gmail.com</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card event-card p-2 h-100 border-0 flex-sm-row flex-column align-items-center">
                            <span class="event-icon d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/vcard3/vcard3-phone.png')}}" alt="phone"/>
                            </span>
                            <div class="event-detail ms-sm-3 mt-sm-0 mt-4">
                                <h6 class="text-white text-sm-start text-center">Mobile Number</h6>
                                <h5 class="event-name text-center mb-0 text-white">+91 97939 97930</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card event-card p-2 h-100 border-0 flex-sm-row flex-column align-items-center">
                            <span class="event-icon d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/vcard3/vcard3-birthday.png')}}" alt="birthday"/>
                            </span>
                            <div class="event-detail ms-sm-3 mt-sm-0 mt-4">
                                <h6 class="text-white text-sm-start text-center">Date of Birth</h6>
                                <h5 class="event-name text-center mb-0 text-white">17 April 1997</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card event-card p-2 h-100 border-0 flex-sm-row flex-column align-items-center">
                            <span class="event-icon d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/vcard3/vcard3-location.png')}}" alt="Address"/>
                            </span>
                            <div class="event-detail ms-sm-3 mt-sm-0 mt-4">
                                <h6 class="text-white text-sm-start text-center">Address</h6>
                                <h5 class="event-name text-center mb-0 text-white">Gujarat - India</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Appointment--}}
        <div class="vcard-three__appointment py-3">
            <h4 class="vcard-three-heading heading-line text-center pb-4 text-white position-relative">Make an
                Appointment</h4>
            <div class="container px-4">
                <div class="row d-flex align-items-center justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="date" class="me-4 appoint-date mb-2">Date</label>
                    </div>
                    <div class="col-md-10">
                        <input id="myID" type="text" class="appoint-input" placeholder="Pick a Date"/>
                    </div>
                </div>
                <div class="row d-flex align-items-center justify-content-center mb-md-3">
                    <div class="col-md-2">
                        <label for="text" class="me-4 appoint-date mb-2">Hour</label>
                    </div>
                    <div class="col-md-5 mb-md-0 mb-3">
                        <div class="card appoint-input flex-row">
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                    <div class="col-md-5 mb-md-0 mb-3">
                        <div class="card appoint-input flex-row">
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                </div>
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-5 mb-md-0 mb-3">
                        <div class="card appoint-input flex-row">
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                    <div class="col-md-5 mb-md-0 mb-3">
                        <div class="card appoint-input flex-row">
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="appoint-btn text-white mt-4 d-block mx-auto ">Make an Appointment</button>
            </div>
        </div>

        {{--our services--}}
        <div class="vcard-three__service py-4 position-relative px-sm-3">
            <img src="{{asset('assets/img/vcard3/vcard3-shape2.png')}}" alt="shape" class="position-absolute start-0 shape-two"/>
            <img src="{{asset('assets/img/vcard3/vcard3-shape3.png')}}" alt="shape" class="position-absolute end-0 bottom-0 shape-three"/>
            <div class="container">
                <h4 class="vcard-three-heading heading-line position-relative text-center">Our Services</h4>
                <div class="row mt-3 g-3">
                    <div class="col-sm-6 col-12">
                        <div class="card service-card p-3 h-100 d-flex align-items-center bg-white">
                            <div class="service-image d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/vcard3/vcard3-service1.png')}}" alt="service"/>
                            </div>
                            <div class="service-details mt-3">
                                <h4 class="service-title text-center">UI/UX Design</h4>
                                <p class="service-paragraph mb-0 text-center">
                                    In every trip includes insurance.
                                    So don’t worry, we’ll cover it!
                                    In every trip includes insurance.
                                    So don’t worry, we’ll cover it!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card service-card p-3 h-100 d-flex align-items-center bg-white">
                            <div class="service-image d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/vcard3/vcard3-service1.png')}}" alt="service"/>
                            </div>
                            <div class="service-details mt-3">
                                <h4 class="service-title text-center">UI/UX Design</h4>
                                <p class="service-paragraph mb-0 text-center">
                                    In every trip includes insurance.
                                    So don’t worry, we’ll cover it!
                                    In every trip includes insurance.
                                    So don’t worry, we’ll cover it!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card service-card p-3 h-100 d-flex align-items-center bg-white">
                            <div class="service-image d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/vcard3/vcard3-service1.png')}}" alt="service"/>
                            </div>
                            <div class="service-details mt-3">
                                <h4 class="service-title text-center">UI/UX Design</h4>
                                <p class="service-paragraph mb-0 text-center">
                                    In every trip includes insurance.
                                    So don’t worry, we’ll cover it!
                                    In every trip includes insurance.
                                    So don’t worry, we’ll cover it!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card service-card p-3 h-100 d-flex align-items-center bg-white">
                            <div class="service-image d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/vcard3/vcard3-service1.png')}}" alt="service"/>
                            </div>
                            <div class="service-details mt-3">
                                <h4 class="service-title text-center">UI/UX Design</h4>
                                <p class="service-paragraph mb-0 text-center">
                                    In every trip includes insurance.
                                    So don’t worry, we’ll cover it!
                                    In every trip includes insurance.
                                    So don’t worry, we’ll cover it!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Gallery--}}
        <div class="vcard-three__product mt-3 py-3 position-relative px-3">
            <h4 class="vcard-three-heading heading-line text-center pb-4 text-white">Gallery</h4>
            <div class="container">
                <div class="row g-3 gallery-slider">
                    <div class="col-6 p-2">
                        <div class="card product-card p-3 border-0 w-100 h-100">
                            <div class="gallery-profile">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                   class="gallery-link">
                                    <img src="https://vcard.waptechy.com/assets/img/video-thumbnail.png" alt="profile"
                                         class="w-100"/>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="card product-card p-3 border-0 w-100 h-100">
                            <div class="gallery-profile">
                                <img src="{{asset('assets/img/vcard1/v2.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <iframe src="//www.youtube.com/embed/Q1NKMPhP8PY"
                                class="w-100" height="315">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>


        {{--products --}}
        <div class="vcard-three__product mt-3 py-3 position-relative px-3">
            <h4 class="vcard-three-heading heading-line text-center pb-4 text-white">Products</h4>
            <div class="container">
                <div class="row g-3 product-slider">
                    <div class="col-6 p-2">
                        <div class="card product-card p-3 border-0 w-100 h-100">
                            <div class="product-profile">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="product-details mt-3">
                                <h4 class="text-white">men's Wear</h4>
                                <p class="mb-2 text-white">
                                    Men Regular Formal Suit
                                </p>
                                <span class="text-white">$150</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="card product-card p-3 border-0 w-100 h-100">
                            <div class="product-profile">
                                <img src="{{asset('assets/img/vcard1/v2.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="product-details mt-3">
                                <h4 class="text-white">Laptop</h4>
                                <p class="mb-2 text-white">
                                    DELL Inspiron Core i3 11th Gen
                                </p>
                                <span class="text-white">$200</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--testimonial--}}
        <div class="vcard-three__testimonial py-4 position-relative px-sm-3">
            <div class="container">
                <h4 class="vcard-three-heading heading-line position-relative text-center">Testimonial</h4>
                <div class="row g-3 testimonial-slider mt-4">
                    <div class="col-12">
                        <div class="card testimonial-card p-3 border-0 w-100">
                            <div
                                class="testimonial-user d-flex flex-sm-row flex-column align-items-center justify-content-sm-start justify-content-center">
                                <img src="{{asset('assets/img/vcard3/testimonial-profile.png')}}" alt="profile"
                                     class="rounded-circle"/>
                                <div class="user-details d-flex flex-column ms-sm-3 mt-sm-0 mt-2">
                                    <span class="user-name text-white text-sm-start text-center">Shane Watson</span>
                                    <span class="user-designation text-white text-sm-start text-center">- CEO at Tarsons</span>
                                </div>
                            </div>
                            <p class="review-message mb-2 text-sm-start text-center mt-2">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Proin dignissim porttitor sollicitudin. Duis tellus ante,
                                aliquet a nisl ac, pharetra suscipit quam. In eu volutpat
                                eros, et bibendum turpis.
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card testimonial-card p-3 border-0 w-100">
                            <div class="testimonial-user d-flex flex-sm-row flex-column align-items-center justify-content-sm-start justify-content-center">
                                <img src="{{asset('assets/img/vcard3/testimonial-profile.png')}}" alt="profile" class="rounded-circle"/>
                                <div class="user-details d-flex flex-column ms-sm-3 mt-sm-0 mt-2">
                                    <span class="user-name text-white text-sm-start text-center">Shane Watson</span>
                                    <span class="user-designation text-white text-sm-start text-center">- CEO at Tarsons</span>
                                </div>
                            </div>
                            <p class="review-message mb-2 text-sm-start text-center mt-2">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Proin dignissim porttitor sollicitudin. Duis tellus ante,
                                aliquet a nisl ac, pharetra suscipit quam. In eu volutpat
                                eros, et bibendum turpis.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- blog--}}
        <div class="vcard-three__blog py-3">
            <h4 class="vcard-three-heading heading-line position-relative text-center pb-4">Blog</h4>
            <div class="container">
                <div class="row g-4 blog-slider overflow-hidden">
                    <div class="col-6 mb-2">
                        <div class="card blog-card p-4 border-0 w-100 h-100 flex-sm-row">
                            <div class="blog-image">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="blog-details ms-sm-5 ms-0 mt-sm-0 mt-5">
                                <h5 class="text-sm-start text-center">men's Wear</h5>
                                <p class="mt-2 mb-0 text-sm-start text-center">
                                    Men Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal Suit
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="card blog-card p-4 border-0 w-100 h-100 flex-sm-row">
                            <div class="blog-image">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="blog-details ms-sm-5 ms-0 mt-sm-0 mt-5">
                                <h5 class="text-sm-start text-center">men's Wear</h5>
                                <p class="mt-2 mb-0 text-sm-start text-center">
                                    Men Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal Suit
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="card blog-card p-4 border-0 w-100 h-100 flex-sm-row">
                            <div class="blog-image">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="blog-details ms-sm-5 ms-0 mt-sm-0 mt-5">
                                <h5 class="text-sm-start text-center">men's Wear</h5>
                                <p class="mt-2 mb-0 text-sm-start text-center">
                                    Men Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal Suit
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--qr code--}}
        <div class="vcard-three__qr-code py-4 position-relative px-sm-3">
            <img src="{{asset('assets/img/vcard3/vcard3-shape3.png')}}" alt="shape" class="position-absolute start-0 top-0"/>
            <div class="container">
                <h4 class="vcard-three-heading heading-line position-relative text-center">QR Code</h4>
                <div class="card qr-code-card flex-sm-row flex-column justify-content-center align-items-center px-sm-3 px-4 py-md-5 py-4 mt-3">
                    <div class="qr-code-scanner mx-md-4 mx-2 p-4 bg-white">
                        <img src="{{asset('assets/img/vcard3/vcard3-qr-code.png')}}" alt="qr profile"/>
                    </div>
                    <div class="mx-2">
                        <button type="button" class="qr-code-btn text-white mt-3 mx-auto">Download My QR Code</button>
                    </div>
                </div>
            </div>
        </div>

        {{--business hour--}}
        <div class="vcard-three__timing py-4 position-relative px-sm-3">
            <img src="{{asset('assets/img/vcard3/vcard3-shape.png')}}" alt="shape"
                 class="position-absolute end-0 shape-four"/>
            <div class="container">
                <h4 class="vcard-three-heading heading-line position-relative text-center">Business Hours</h4>
                <div class="row mt-5 justify-content-center">
                    <div class="col-sm-8 col-12 time-section">
                        <div class="d-flex justify-content-center time-zone">
                            <span class="me-2">Sunday :</span>
                            <span>08:10 - 20:00</span>
                        </div>
                        <div class="d-flex justify-content-center time-zone">
                            <span class="me-2">Monday :</span>
                            <span>08:10 - 20:00</span>
                        </div>
                        <div class="d-flex justify-content-center time-zone">
                            <span class="me-2">Tuesday :</span>
                            <span>08:10 - 20:00</span>
                        </div>
                        <div class="d-flex justify-content-center time-zone">
                            <span class="me-2">Wednesday :</span>
                            <span>08:10 - 20:00</span>
                        </div>
                        <div class="d-flex justify-content-center time-zone">
                            <span class="me-2">Thursday :</span>
                            <span>08:10 - 20:00</span>
                        </div>
                        <div class="d-flex justify-content-center time-zone">
                            <span class="me-2">Friday :</span>
                            <span>08:10 - 20:00</span>
                        </div>
                        <div class="d-flex justify-content-center time-zone">
                            <span class="me-2">Saturday :</span>
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--Contact us--}}
        <div class="vcard-three__contact py-4 position-relative">
            <img src="{{asset('assets/img/vcard3/vcard3-shape3.png')}}" alt="shape" class="position-absolute start-0 bottom-0"/>
            <div class="container">
                <h4 class="vcard-three-heading heading-line position-relative text-center">Contact Us</h4>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="contact-form px-sm-5">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" placeholder="Full Name">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" placeholder="E-mail Address">
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control" id="mobile" placeholder="Mobile Number">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" placeholder="Type a message here..." id="message"
                                          rows="5"></textarea>
                            </div>
                            <button type="button" class="contact-btn text-white mt-4 d-block mx-auto">Send Message
                            </button>
                        </div>
                        <div class="d-sm-flex justify-content-center my-5">
                            <button type="submit" class="vcard-three-btn text-white mt-4 d-block">
                                <i class="fas fa-download me-2"></i> Download Vcard
                            </button>
                            {{--share btn--}}
                            <button type="button" class="share-btn text-white d-block btn mt-4">
                                <a href="#" class="text-white text-decoration-none">
                                    <i class="fas fa-share-alt me-2"></i> Share</a>
                            </button>
                        </div>
                        <br>
                        <div class="m-2 ">
                            <iframe width="100%" height="300px"
                                    src='https://maps.google.de/maps?q=White+House,+TN,+USA/&output=embed'
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                    style="border-radius: 10px;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/front-third-party.js') }}"></script>
<script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    $('.testimonial-slider').slick({
        dots: true,
        infinite: true,
        arrows: false,
        autoplay: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1
    });
</script>

<script>
    $('.product-slider').slick({
        dots: true,
        infinite: true,
        arrows: false,
        speed: 300,
        slidesToShow: 2,
        autoplay: true,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            }
        ]
    });

    $('.blog-slider').slick({
        dots: true,
        infinite: true,
        arrows: false,
        speed: 300,
        slidesToShow: 1,
        autoplay: true,
        slidesToScroll: 1
    });
</script>
<script>
    $("#myID").flatpickr();
</script>

<script>
    $('.gallery-slider').slick({
        dots: true,
        infinite: true,
        arrows: false,
        speed: 300,
        slidesToShow: 2,
        autoplay: true,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            }
        ]
    });
</script>

<script>
    $(document).ready(function () {
        $('.dropdown1').hover(function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(100);
        }, function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(100);
        });
    });
</script>
</body>
</html>
