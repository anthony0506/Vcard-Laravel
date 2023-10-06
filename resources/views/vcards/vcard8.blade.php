<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
   <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">

    {{--css link--}}
    <link rel="stylesheet" href="{{ asset('assets/css/vcard8.css')}}">

    {{--slick slider--}}
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
    
    {{--google Font--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <title>Vcard</title>
</head>
<body>
<div class="container">
    <div class="vcard-eight main-content w-100 mx-auto overflow-hidden">
        
        {{--banner--}}
        <div class="vcard-eight__banner w-100 position-relative">
            <img src="{{asset('assets/img/vcard8/vcard8-banner.png')}}" class="img-fluid banner-image position-relative"
                 alt="banner"/>

            <div class="d-flex justify-content-end position-absolute top-0 end-0 me-3 custom-language">
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
        {{--profile details--}}
        <div>
        <div class="vcard-eight__profile d-flex align-items-center px-4 flex-sm-row flex-column position-relative">
            <div class="vcard-eight__avatar">
                <img src="{{asset('assets/img/vcard8/vcard8-profile.png')}}" class="rounded-circle"/>
            </div>
            <div class="vcard-eight__position d-flex flex-column mx-4 position-relative">
                <div class="d-flex flex-column">
                    <span class="vcard-eight-heading fw-bold text-white text-sm-start text-center">Vansh Rathod</span>
                    <span class="avatar-designation text-white text-sm-start text-center">a freelancer UI/UX Designer</span>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center mb-5">
            <span class="pt-5 profile-description" > I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery</span>
        </div>
        </div>
        {{--social media icon--}}
        <div class="vcard-eight__social py-3 px-3 position-relative">
            <div class="social-icons d-flex justify-content-center pt-4">
                <span class="social-back rounded-circle d-flex justify-content-center align-items-center me-sm-3 me-1">
                    <i class="fab fa-facebook facebook-icon icon fa-2x"></i>
                </span>
                <span class="social-back rounded-circle d-flex justify-content-center align-items-center mx-sm-3 mx-1">
                    <i class="fab fa-instagram instagram-icon icon fa-2x"></i>
                </span>
                <span class="social-back rounded-circle d-flex justify-content-center align-items-center mx-sm-3 mx-1">
                    <i class="fab fa-linkedin-in linkedin-icon icon fa-2x"></i>
                </span>
                <span class="social-back rounded-circle d-flex justify-content-center align-items-center mx-sm-3 mx-1">
                    <i class="fab fa-whatsapp whatsapp-icon icon fa-2x"></i>
                </span>
                <span class="social-back rounded-circle d-flex justify-content-center align-items-center ms-sm-3 ms-1">
                    <i class="fab fa-twitter twitter-icon icon fa-2x"></i>
                </span>
            </div>
        </div>
        {{--event--}}
        <div class="vcard-eight__event py-3 px-sm-4 px-3 mt-2 position-relative">
            <div class="row">
                <div class="col-12">
                    <div class="card event-card p-4">
                        <div class="row g-4">
                            <div class="col-sm-6 col-12">
                                <div class="event-icon rounded-circle d-flex justify-content-center align-items-center mx-auto mb-2">
                                    <img src="{{asset('assets/img/vcard8/vcard8-email.png')}}" alt="email"/>
                                </div>
                                <div class="event-details">
                                    <span class="text-white text-center d-block mb-1">E-mail address</span>
                                    <h5 class="text-center mb-0 text-white">vanshrathod032@gmail.com</h5>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="event-icon rounded-circle d-flex justify-content-center align-items-center mx-auto mb-2">
                                    <img src="{{asset('assets/img/vcard8/vcard8-phone.png')}}" alt="mobile"/>
                                </div>
                                <div class="event-details">
                                    <span class="text-white text-center d-block mb-1">Mobile Number</span>
                                    <h5 class="text-center mb-0 text-white">+91 95864 12484</h5>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="event-icon rounded-circle d-flex justify-content-center align-items-center mx-auto mb-2">
                                    <img src="{{asset('assets/img/vcard8/vcard8-birthday.png')}}" alt="birthday"/>
                                </div>
                                <div class="event-details">
                                    <span class="text-white text-center d-block mb-1">Date of Birth</span>
                                    <h5 class="text-center mb-0 text-white">4 December 1998</h5>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="event-icon rounded-circle d-flex justify-content-center align-items-center mx-auto mb-2">
                                    <img src="{{asset('assets/img/vcard8/vcard8-location.png')}}" alt="Address"/>
                                </div>
                                <div class="event-details">
                                    <span class="text-white text-center d-block mb-1">Address</span>
                                    <h5 class="text-center mb-0 text-white">Gujarat - India</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Appointment--}}
        <div class="vcard-eight__appointment py-3 px-sm-4 px-3 mt-2 position-relative">
            <div class="container">
                <h4 class="vcard-eight-heading heading-line text-center pb-4 text-white position-relative d-block mx-auto">
                    Make an Appointment</h4>
                <div class="appointment p-4">
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
                    <button type="button" class="appoint-btn text-white mt-4 d-block mx-auto ">Make an Appointment
                    </button>
                </div>
            </div>
        </div>

        {{--our services--}}
        <div class="vcard-eight__service py-4 position-relative px-sm-4 px-3">
            <div class="container">
                <h4 class="vcard-eight-heading heading-line position-relative text-center d-block mx-auto pb-3">Our Services</h4>
                <div class="row mt-3 service-bg bg-white">
                    <div class="col-sm-6 col-12 p-3">
                        <div class="card service-card px-3 py-0 h-100 border-0">
                            <div class="service-image d-flex justify-content-center align-items-center rounded-circle">
                                <img src="{{asset('assets/img/vcard3/vcard3-service1.png')}}" alt="UI/UX"/>
                            </div>
                            <div class="service-details mt-3">
                                <h4 class="service-title text-sm-start text-center">UI/UX Design</h4>
                                <p class="service-paragraph mb-0 text-sm-start text-center">
                                    In every trip includes insurance.
                                    So don’t worry, we’ll cover it!
                                    In every trip includes insurance.
                                    So don’t worry, we’ll cover it!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 p-3">
                        <div class="card service-card px-3 py-0 h-100 border-0">
                            <div class="service-image d-flex justify-content-center align-items-center rounded-circle">
                                <img src="{{asset('assets/img/vcard3/vcard3-service1.png')}}" alt="UI/UX"/>
                            </div>
                            <div class="service-details mt-3">
                                <h4 class="service-title text-sm-start text-center">UI/UX Design</h4>
                                <p class="service-paragraph mb-0 text-sm-start text-center">
                                    In every trip includes insurance.
                                    So don’t worry, we’ll cover it!
                                    In every trip includes insurance.
                                    So don’t worry, we’ll cover it!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 p-3">
                        <div class="card service-card px-3 py-0 h-100 border-0">
                            <div class="service-image d-flex justify-content-center align-items-center rounded-circle">
                                <img src="{{asset('assets/img/vcard3/vcard3-service1.png')}}" alt="UI/UX"/>
                            </div>
                            <div class="service-details mt-3">
                                <h4 class="service-title text-sm-start text-center">UI/UX Design</h4>
                                <p class="service-paragraph mb-0 text-sm-start text-center">
                                    In every trip includes insurance.
                                    So don’t worry, we’ll cover it!
                                    In every trip includes insurance.
                                    So don’t worry, we’ll cover it!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 p-3">
                        <div class="card service-card px-3 py-0 h-100 border-0">
                            <div class="service-image d-flex justify-content-center align-items-center rounded-circle">
                                <img src="{{asset('assets/img/vcard3/vcard3-service1.png')}}" alt="UI/UX"/>
                            </div>
                            <div class="service-details mt-3">
                                <h4 class="service-title text-sm-start text-center">UI/UX Design</h4>
                                <p class="service-paragraph mb-0 text-sm-start text-center">
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

        {{--gallery--}}
        <div class="vcard-eight__gallery py-4 position-relative px-sm-4 px-3">
            <h4 class="vcard-eight-heading heading-line position-relative text-center d-block mx-auto pb-3">Gallery</h4>
            <div class="row g-3 gallery-slider mt-2">
                <div class="col-6">
                    <div class="card gallery-card p-3 border-0 w-100">
                        <div class="gallery-profile">
                            <div>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                   class="gallery-link">
                                    <img src="https://vcard.waptechy.com/assets/img/video-thumbnail.png" alt="profile" class="w-100"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card gallery-card p-3 border-0 w-100">
                        <div class="gallery-profile">
                            <img src="{{asset('assets/img/vcard1/v2.jpg')}}" alt="profile" class="w-100"/>
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

        {{--product--}}
        <div class="vcard-eight__product py-4 position-relative px-sm-4 px-3">
            <h4 class="vcard-eight-heading heading-line position-relative text-center d-block mx-auto pb-3">
                Products</h4>
            <div class="row g-3 product-slider mt-2">
                <div class="col-6">
                    <div class="card product-card p-3 border-0 w-100">
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
                <div class="col-6">
                    <div class="card product-card p-3 border-0 w-100">
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
                </div><div class="col-6">
                    <div class="card product-card p-3 border-0 w-100">
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

        {{--trstimonial--}}
        <div class="vcard-eight__testimonial py-4 position-relative px-sm-4 px-3">
            <h4 class="vcard-eight-heading heading-line position-relative text-center d-block mx-auto pb-3">
                Testimonial</h4>
            <div class="row g-3 testimonial-slider testimonial-slider-demo mt-2">
                <div class="col-12">
                    <div class="card testimonial-card p-3 border-0 w-100">
                        <div
                            class="testimonial-user d-flex flex-column align-items-center justify-content-sm-start justify-content-center">
                            <img src="{{asset('assets/img/vcard3/testimonial-profile.png')}}" alt="profile"
                                 class="rounded-circle"/>
                            <div class="user-details d-flex flex-column mt-2">
                                <span class="user-name text-center">Shane Watson</span>
                                <span class="user-designation text-center">- CEO at Tarsons</span>
                            </div>
                        </div>
                        <p class="review-message text-center mt-2 mx-auto">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Proin dignissim porttitor sollicitudin. Duis tellus ante,
                            aliquet a nisl ac, pharetra suscipit quam. In eu volutpat
                            eros, et bibendum turpis.
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card testimonial-card p-3 border-0 w-100">
                        <div class="testimonial-user d-flex flex-column align-items-center justify-content-sm-start justify-content-center">
                            <img src="{{asset('assets/img/vcard3/testimonial-profile.png')}}" alt="profile" class="rounded-circle"/>
                            <div class="user-details d-flex flex-column mt-2">
                                <span class="user-name text-center">Shane Watson</span>
                                <span class="user-designation text-center">- CEO at Tarsons</span>
                            </div>
                        </div>
                        <p class="review-message text-center mt-2 mx-auto">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Proin dignissim porttitor sollicitudin. Duis tellus ante,
                            aliquet a nisl ac, pharetra suscipit quam. In eu volutpat
                            eros, et bibendum turpis.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- blog--}}
        <div class="vcard-eight__blog position-relative py-3">
            <h4 class="vcard-eight-heading heading-line position-relative text-center d-block mx-auto pb-3">Blog</h4>
            <div class="container">
                <div class="row g-4 blog-slider overflow-hidden">
                    <div class="col-6 mb-2">
                        <div class="card blog-card border-0 w-100 h-100">
                            <div class="blog-image">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="blog-details mt-3">
                                <h5 class="text-center">men's Wear</h5>
                                <p class="mt-2 mb-0 text-center">
                                    Men Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal Suit
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="card blog-card border-0 w-100 h-100">
                            <div class="blog-image">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="blog-details mt-3">
                                <h5 class="text-center">men's Wear</h5>
                                <p class="mt-2 mb-0 text-center">
                                    Men Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal Suit
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="card blog-card border-0 w-100 h-100">
                            <div class="blog-image">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="blog-details mt-3">
                                <h5 class="text-center">men's Wear</h5>
                                <p class="mt-2 mb-0 text-center">
                                    Men Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal Suit
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--qr code--}}
        <div class="vcard-eight__qr-code py-4 position-relative px-sm-4 px-3">
            <h4 class="vcard-eight-heading heading-line position-relative text-center d-block mx-auto pb-3">QR Code</h4>
            <div class="card qr-code-card justify-content-center align-items-center px-sm-3 px-4 pt-5 pb-4 position-relative w-100 mx-auto">
               
                <div class="mt-3 qr-code-scanner mx-md-4 mx-2 p-2 bg-white">
                    <img src="{{asset('assets/img/vcard3/vcard3-qr-code.png')}}" alt="qr profile"/>
                </div>
                <div class="mx-2">
                    <button type="button" class="qr-code-btn text-white mt-4 mx-auto">Download My QR Code</button>
                </div>
            </div>
        </div>

        {{--business hour--}}
        <div class="vcard-eight__timing py-4 position-relative px-sm-4 px-3">
            <div class="container">
                <h4 class="vcard-eight-heading heading-line position-relative text-center d-block mx-auto pb-3">Business
                    Hours</h4>
                <div class="row mt-3 justify-content-center">
                    <div class="col-sm-8 col-12 time-section px-3 py-1">
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
        {{--contact us--}}
        <div class="vcard-eight__contact py-4 position-relative px-sm-4 px-3">
            <h4 class="vcard-eight-heading heading-line position-relative text-center d-block mx-auto pb-3">Contact us</h4>
            <div class="container">
                <div class="row mt-4">
                    <div class="col-12 px-0">
                        <div class="contact-form px-sm-3">
                            <div class="mb-3">
                                <label class="form-label">Your Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border-start-0" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control border-start-0" placeholder="E-mail Address">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <div class="input-group mb-3">
                                    <input type="tel" class="form-control border-start-0" placeholder="Mobile Number">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" placeholder="Type a message here..." id="message"
                                          rows="5"></textarea>
                            </div>
                            <button type="button" class="contact-btn text-white mt-4 d-block ms-auto">Send Message
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-sm-flex justify-content-center mt-5">
                <button type="submit" class="vcard-eight-btn mt-4 d-block btn text-white">
                    <i class="fas fa-download me-2"></i> Download Vcard
                </button>
                {{--share btn--}}
                <button type="button" class="share-btn d-block btn mt-4 ms-sm-3">
                    <a href="#" class="text-decoration-none text-white">
                        <i class="fas fa-share-alt me-2"></i>Share</a>
                </button>
            </div>
            <br>
            <div class="m-2 ">
                <iframe width="100%" height="300px"
                        src='https://maps.google.de/maps?q=White+House,+TN,+USA/&output=embed' frameborder="0"
                        scrolling="no" marginheight="0" marginwidth="0" style="border-radius: 10px;"></iframe>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('backend/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/js/slick.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/js/front-third-party.js') }}"></script>
<script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $('.testimonial-slider').slick({
        dots: true,
        infinite: true,
        arrows: true,
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
