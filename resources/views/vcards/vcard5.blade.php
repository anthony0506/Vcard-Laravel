<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">

    <title>Vcard New</title>

    {{--css link--}}
    <link rel="stylesheet" href="{{ asset('assets/css/vcard5.css')}}">

    {{--slick slider--}}
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">


    {{--google font--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
            href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@500&family=PT+Sans:wght@700&family=Poppins:wght@600&family=Roboto&display=swap"
            rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>
<body>

<div class="container main-section">
    <div class="row d-flex justify-content-center">
        <div class="main-bg p-0">
            <div class="head-img position-relative">
                <img src="{{asset('assets/img/vcardnew-bg.png')}}" height="400px" class="img-fluid"/>

                <div class="d-flex justify-content-end position-absolute top-0 end-0 me-3">
                    <div class="language pt-3 me-2">
                        <ul class="text-decoration-none">
                            <li class="dropdown1 dropdown lang-list">
                                <a class="dropdown-toggle lang-head text-decoration-none" data-toggle="dropdown"
                                   role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-language me-2"></i>Language</a>
                                <ul class="dropdown-menu start-0 image-icon lang-hover-list top-100">
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
                                        <img src="{{asset('assets/img/vcard1/russian.jpeg')}}" width="25px"
                                             height="20px"
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
            <div class="mb-5">
                <div class="profile-img">
                    <img src="{{asset('assets/img/newgirl.png')}}" width="150px"
                         class="pro-img me-sm-4 rounded-circle mb-4"/>
                    <div>
                        <h3 class="big-title">I’m Sally Watson</h3>
                        <p class="small-title">a freelance web Designer</p>
                    </div>

                </div>
                <div class="d-flex align-items-center ">
                    <span class="pt-2 px-2 profile-description"> I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery</span>
                </div>
                <br>
            </div>


            {{--social-icon--}}
            <div class="container">
                <div class="social-section pb-4 px-sm-5">
                    <div class="social-icon">
                        <i class="fab fa-facebook pro-icon facebook-icon me-4"></i>
                        <i class="fab fa-instagram me-4 pro-icon instagram-icon"></i>
                        <i class="fab fa-linkedin-in me-4 pro-icon linkedin-icon"></i>
                        <i class="fab fa-whatsapp me-4 pro-icon whatsapp-icon"></i>
                        <i class="fab fa-twitter pro-icon twitter-icon"></i>
                    </div>
                </div>
            </div>

            {{--about-section--}}
            <div class="container">
                <div class="about-section mb-4">
                    <div class="row">
                        <div class="col-sm-6 pb-4">
                            <div class="about-details">
                                <img src="{{asset('assets/img/aboutemail.png')}}" class="mb-2"/>
                                <p class="about-title mb-0">sly.watson@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-sm-6 pb-4">
                            <div class="about-details">
                                <img src="{{asset('assets/img/aboutcake.png')}}" class="mb-2"/>
                                <p class="about-title mb-0">30 October 1997</p>
                            </div>
                        </div>
                        <div class="col-sm-6 pb-4">
                            <div class="about-details">
                                <img src="{{asset('assets/img/aboutcall.png')}}" class="mb-2"/>
                                <p class="about-title mb-0">+ 91 99746 99793</p>
                            </div>
                        </div>
                        <div class="col-sm-6 pb-4">
                            <div class="about-details">
                                <img src="{{asset('assets/img/aboutlocation.png')}}" class="mb-2"/>
                                <p class="about-title mb-0">Melbourne - Australia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Appointment--}}
            <div class="container py-3 mb-4">
                <h2 class="appointment-heading mb-4 position-relative">Make an Appointment</h2>
                <div class="appointment">
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

            {{--Our service--}}

            <div class="container">
                <div class="main-our-service mb-4">
                    <div class="service-header-title">
                        <h2 class="mb-4">Our Services</h2>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="service-info d-flex align-items-center">
                                <div class="service-img me-3 rounded-circle">
                                    <img src="{{asset('assets/img/s1.png')}}"/>
                                </div>
                                <div>
                                    <span class="service-heading">Web Design</span>
                                    <p class="mb-0 service-title">There are many variations of passages of Lorem Ipsum
                                        available,
                                        but the majority have suffered alteration in some form</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="service-info d-flex align-items-center">
                                <div class="service-img me-3 rounded-circle">
                                    <img src="{{asset('assets/img/s2.png')}}"/>
                                </div>
                                <div>
                                    <span class="service-heading">UI & UX Design</span>
                                    <p class="mb-0 service-title">There are many variations of passages of Lorem Ipsum
                                        available,
                                        but the majority have suffered alteration in some form</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="service-info d-flex align-items-center">
                                <div class="service-img me-3 rounded-circle">
                                    <img src="{{asset('assets/img/s3.png')}}"/>
                                </div>
                                <div>
                                    <span class="service-heading">App Design</span>
                                    <p class="mb-0 service-title">There are many variations of passages of Lorem Ipsum
                                        available,
                                        but the majority have suffered alteration in some form</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="service-info d-flex align-items-center">
                                <div class="service-img me-3 rounded-circle">
                                    <img src="{{asset('assets/img/s4.png')}}"/>
                                </div>
                                <div>
                                    <span class="service-heading">Web Development</span>
                                    <p class="mb-0 service-title">There are many variations of passages of Lorem Ipsum
                                        available,
                                        but the majority have suffered alteration in some form</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--gallery--}}
            <div class="container">
                <div class="main-gallery pb-4">
                    <div class="gallery-header-title">
                        <h2 class="mb-4">Gallery</h2>
                    </div>
                    <div class="row gallery-vcard d-flex justify-content-center g-3">
                        <div class="col-6">
                            <div class="card gallery-shadow w-100">
                                <div class="gallery-profile">
                                    <div>
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal" class="gallery-link">
                                            <div class="gallery-item"
                                                 style="background-image: url(&quot;https://vcard.waptechy.com/assets/img/video-thumbnail.png&quot;)">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card gallery-shadow w-100">
                                <div class="gallery-profile">
                                    <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
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

            {{--Product--}}

            <div class="container">
                <div class="main-product pb-4">
                    <div class="product-header-title">
                        <h2 class="mb-4">Products</h2>
                    </div>
                    <div class="row product-vcard d-flex justify-content-center g-3">
                        <div class="col-6">
                            <div class="card product-shadow w-100">
                                <div class="product-profile">
                                    <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                                </div>
                                <div class="product-details mt-3">
                                    <h4>men's Wear</h4>
                                    <p class="mb-2">
                                        Men Regular Formal Suit
                                    </p>
                                    <span class="text-black">$150</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card product-shadow w-100">
                                <div class="product-profile">
                                    <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                                </div>
                                <div class="product-details mt-3">
                                    <h4>men's Wear</h4>
                                    <p class="mb-2">
                                        Men Regular Formal Suit
                                    </p>
                                    <span class="text-black">$150</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--testimonial--}}

            <div class="container">
                <div class="main-testimonial pb-4">
                    <div class="testimonial-header-title">
                        <h2 class="mb-4">Testimonial</h2>
                    </div>
                    <div class="row testimonial-vcard d-flex justify-content-center g-3">
                        <div class="col-12">
                            <div class="card text-center testi-shadow w-100">
                                <div>
                                    <p class="mb-3 testi-description">“Designing systems useful for the user is the most
                                        interesting element in
                                        the entire field of design, which makes it goosebumps with each
                                        completed project.”</p>
                                </div>
                                <div class="card-body p-0">
                                    <div class="row d-flex justify-content-between align-items-end">
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center">
                                                <img src="{{asset('assets/img/t1.png')}}"
                                                     class="me-3 testi-logo rounded-circle"/>
                                                <div>
                                                    <h6 class="testi-card-title mb-0">Scarlett Aria</h6>
                                                    <p class="mb-0 testi-card-text">CEO General Electric</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card text-center testi-shadow w-100">
                                <div>
                                    <p class="mb-3 testi-description">“Designing systems useful for the user is the most
                                        interesting element in
                                        the entire field of design, which makes it goosebumps with each
                                        completed project.”</p>
                                </div>
                                <div class="card-body p-0">
                                    <div class="row d-flex justify-content-between align-items-end">
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center">
                                                <img src="{{asset('assets/img/t1.png')}}"
                                                     class="me-3 testi-logo rounded-circle"/>
                                                <div>
                                                    <h6 class="testi-card-title mb-0">Scarlett Aria</h6>
                                                    <p class="mb-0 testi-card-text">CEO General Electric</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- blog--}}
            <div class="container py-3 blog-section">
                <h2 class="mb-4">Blog</h2>
                <div class="container px-0">
                    <div class="row g-4 blog-slider overflow-hidden">
                        <div class="col-6 mb-2">
                            <div class="card blog-card border-0 w-100 h-100">
                                <div class="blog-image">
                                    <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                                </div>
                                <div class="blog-details mt-5">
                                    <h5 class="text-center">men's Wear</h5>
                                    <p class="mt-2 mb-0 text-center">
                                        Men Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular
                                        Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal
                                        SuitMen Regular Formal Suit
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <div class="card blog-card border-0 w-100 h-100">
                                <div class="blog-image">
                                    <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                                </div>
                                <div class="blog-details mt-5">
                                    <h5 class="text-center">men's Wear</h5>
                                    <p class="mt-2 mb-0 text-center">
                                        Men Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular
                                        Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal
                                        SuitMen Regular Formal Suit
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <div class="card blog-card border-0 w-100 h-100">
                                <div class="blog-image">
                                    <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                                </div>
                                <div class="blog-details mt-5">
                                    <h5 class="text-center">men's Wear</h5>
                                    <p class="mt-2 mb-0 text-center">
                                        Men Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular
                                        Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal
                                        SuitMen Regular Formal Suit
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Qr code--}}
            <div class="main-Qr-section mb-5">
                <div class="qr-header-title">
                    <h2 class="mb-5 text-center">QR Code</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-center mb-4">
                            <img src="{{asset('assets/img/newqr.png')}}" class="qr-img"/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center">
                            <img src="{{asset('assets/img/newgirl.png')}}" width="125px"
                                 class="qr-logo rounded-circle"/>
                            <div class="mt-4">
                                <button type="button" class="btn btn-lg Qr-btn" disabled>Download My QR Code
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--business-hour--}}
            <div class="container">
                <div class="main-business mb-4">
                    <div class="business-heading">
                        <h2 class="mb-4">Business Hours</h2>
                    </div>
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-lg-6 mb-3">
                            <div class="business-days">
                                <p class="mb-0 business-title">Sunday : 08:10 - 20:00</p>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="business-days">
                                <p class="mb-0 business-title">Monday : 08:10 - 20:00</p>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="business-days">
                                <p class="mb-0 business-title">Tuesday : 08:10 - 20:00</p>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="business-days">
                                <p class="mb-0 business-title">Wednesday : 08:10 - 10:00</p>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="business-days">
                                <p class="mb-0 business-title">Thursday : 08:10 - 20:00</p>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="business-days">
                                <p class="mb-0 business-title">Friday : 08:10 - 20:00</p>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="business-days">
                                <p class="mb-0 business-title">Saturday : Closed</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{--contact us--}}

            <div class="container py-4">
                <h2 class="contact-heading mb-4 text-center">Contact Us</h2>
                <div class="main-contact">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <label for="basic-url" class="form-label mb-0">Your Name</label>
                                <div class="col-12 mb-3 input-group">
                                    <span class="input-group-text bg-white contact-input border-end-0"
                                          id="basic-addon1"><i
                                                class="far fa-user"></i></span>
                                    <input type="text" class="form-control contact-input border-start-0"
                                           id="inputAddress" placeholder="Full Name">
                                </div>

                                <label for="basic-url" class="form-label mb-0">E-mail</label>
                                <div class="col-12 mb-3 input-group">
                                    <span class="input-group-text bg-white contact-input border-end-0"
                                          id="basic-addon1"><i
                                                class="far fa-envelope"></i></span>
                                    <input type="text" class="form-control contact-input border-start-0"
                                           id="inputAddress" placeholder="E-mail Address">
                                </div>

                                <label for="inputAddress" class="form-label mb-0">Phone</label>
                                <div class="col-12 mb-3 input-group">
                                    <span class="input-group-text bg-white contact-input border-end-0"
                                          id="basic-addon1"><i
                                                class="fas fa-phone"></i></span>
                                    <input type="text" class="form-control contact-input border-start-0"
                                           id="inputAddress" placeholder="Mobile Number">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Your Message</label>
                                    <textarea class="form-control contact-input" id="exampleFormControlTextarea1"
                                              rows="7" placeholder="Type a Message..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <button type="button" class="btn contact-btn px-4">Send Message</button>
                        </div>
                    </div>
                </div>
                <div class="d-sm-flex justify-content-center mt-5">
                    <button type="submit" class="vcard-five-btn mt-4 btn d-block text-white">
                        <i class="fas fa-download me-2"></i> Download Vcard
                    </button>
                    {{--share btn--}}
                    <button type="button" class="share-btn text-white d-block btn mt-4 ms-sm-3">
                        <a href="#" class="text-white text-decoration-none">
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
</div>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/front-third-party.js') }}"></script>
<script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    $('.testimonial-vcard').slick({
        dots: true,
        infinite: true,
        speed: 300,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
    });
</script>

<script>
    $('.product-vcard').slick({
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
    $('.gallery-vcard').slick({
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
