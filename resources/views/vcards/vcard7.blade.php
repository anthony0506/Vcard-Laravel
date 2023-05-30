<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
   <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">

    <title>Vcard7 layout</title>

    {{--css link--}}
    <link rel="stylesheet" href="{{ asset('assets/css/vcard7.css')}}">

    {{--slick slider--}}
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>
<body>

<div class="container main-section">
    <div class="row d-flex justify-content-center">
        <div class="main-bg p-0">
           
            <div class="position-relative">
                <img src="{{asset('assets/img/vcard7/bannerimg.png')}}" class="banner-img"/>

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
            <div class="container">
                <div class="main-profile">
                    <div class="profile-img py-3">
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-4">
                                <div>
                                    <img src="{{asset('assets/img/vcard7/profilegirl.png')}}"
                                         class="img-fluid rounded-circle"/>
                                </div>
                                <div class="ms-3">
                                    <h3 class="big-title">Pallavi Hegde</h3>
                                    <p class="small-title mb-0">a Freelancer UI/UX Designer</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-5">
                                <span class="pt-2  profile-description"> I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery</span>
                            </div>
                            <div class="social-section mb-4">
                                <div class="container px-md-5">
                                    <div class="social-icon d-flex justify-content-center">
                                        <div class="pro-icon me-md-3">
                                            <i class="fab fa-facebook-f facebook-icon"></i>
                                        </div>
                                        <div class="pro-icon mx-md-3">
                                            <i class="fab fa-instagram instagram-icon"></i>
                                        </div>
                                        <div class="pro-icon mx-md-3">
                                            <i class="fab fa-linkedin-in linkedin-icon"></i>
                                        </div>
                                        <div class="pro-icon mx-md-3">
                                            <i class="fab fa-whatsapp whatsapp-icon" ></i>
                                        </div>
                                        <div class="pro-icon ms-md-3">
                                            <i class="fab fa-twitter twitter-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <div class="card border-0 bg-transparent">
                                    <div class="event-icon text-center">
                                        <div>
                                            <img src="{{asset('assets/img/vcard7/email.png')}}" class="img-fluid mb-2"/>
                                        </div>
                                        <span class="event-title">E-mail Address</span>
                                        <p class="mb-0 event-text">palluhegde98@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-4">
                                <div class="card border-0 bg-transparent">
                                    <div class="event-icon text-center">
                                        <div>
                                            <img src="{{asset('assets/img/vcard7/phone.png')}}" class="img-fluid mb-2"/>
                                        </div>
                                        <span class="event-title">Mobile Number</span>
                                        <p class="mb-0 event-text">+91 9664652746</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-4">
                                <div class="card border-0 bg-transparent">
                                    <div class="event-icon text-center">
                                        <div>
                                            <img src="{{asset('assets/img/vcard7/cake.png')}}" class="img-fluid mb-2"/>
                                        </div>
                                        <span class="event-title">Date of Birth</span>
                                        <p class="mb-0 event-text">20-january-1997</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-4">
                                <div class="card border-0 bg-transparent">
                                    <div class="event-icon text-center">
                                        <div>
                                            <img src="{{asset('assets/img/vcard7/location.png')}}"
                                                 class="img-fluid mb-2"/>
                                        </div>
                                        <span class="event-title">Address</span>
                                        <p class="mb-0 event-text">Surat-india</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Appointment--}}
            <div class="container py-3 mb-4">
                <h2 class="appointment-heading mb-4 position-relative text-center">Make an Appointment</h2>
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
                            <div class="card appoint-input flex-row justify-content-center">
                                <span>08:10 - 20:00</span>
                            </div>
                        </div>
                        <div class="col-md-5 mb-md-0 mb-3">
                            <div class="card appoint-input flex-row justify-content-center">
                                <span>08:10 - 20:00</span>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-5 mb-md-0 mb-3">
                            <div class="card appoint-input flex-row justify-content-center">
                                <span>08:10 - 20:00</span>
                            </div>
                        </div>
                        <div class="col-md-5 mb-md-0 mb-3">
                            <div class="card appoint-input flex-row justify-content-center">
                                <span>08:10 - 20:00</span>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="appoint-btn mt-4 d-block mx-auto btn btn-lg">Make an Appointment
                    </button>
                </div>
            </div>

            {{--our services--}}
            <div class="container mb-4">
                <div class="our-service-title">
                    <h2 class="mb-4 text-center">Our Services</h2>
                </div>
                <div class="our-service-section">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="our-service-info d-flex align-items-center">
                                <div class="our-service-img me-3 rounded-circle">
                                    <img src="{{asset('assets/img/vcard7/design.png')}}"/>
                                </div>
                                <div>
                                    <span class="our-service-heading">Web Design</span>
                                    <p class="mb-0 our-service-title">There are many variations of passages of Lorem
                                        Ipsum
                                        available,
                                        but the majority have suffered alteration in some form</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="our-service-info d-flex align-items-center">
                                <div class="our-service-img me-3 rounded-circle">
                                    <img src="{{asset('assets/img/vcard7/ui.png')}}"/>
                                </div>
                                <div>
                                    <span class="our-service-heading">UI & UX Design</span>
                                    <p class="mb-0 our-service-title">There are many variations of passages of Lorem
                                        Ipsum
                                        available,
                                        but the majority have suffered alteration in some form</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="our-service-info d-flex align-items-center">
                                <div class="our-service-img me-3 rounded-circle">
                                    <img src="{{asset('assets/img/vcard7/app.png')}}"/>
                                </div>
                                <div>
                                    <span class="our-service-heading">Application Design</span>
                                    <p class="mb-0 our-service-title">There are many variations of passages of Lorem
                                        Ipsum
                                        available,
                                        but the majority have suffered alteration in some form</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="our-service-info d-flex align-items-center">
                                <div class="our-service-img me-3 rounded-circle">
                                    <img src="{{asset('assets/img/vcard7/website.png')}}"/>
                                </div>
                                <div>
                                    <span class="our-service-heading">Website Development</span>
                                    <p class="mb-0 our-service-title">There are many variations of passages of Lorem
                                        Ipsum
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
                <div class="gallery-main-section pb-4">
                    <div class="header-gallery">
                        <h2 class="mb-4 text-center">Gallery</h2>
                    </div>
                    <div class="row gallery-vcard d-flex justify-content-center g-3">
                        <div class="col-6 px-3 gallery-vcard-position">
                            <div class="card shadow-product w-100 border-0 h-100 shadow-gallery">              
                                <div class="gallery-profile">
                                    <div>
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal"
                                           class="gallery-link">
                                            <img src="https://vcard.waptechy.com/assets/img/video-thumbnail.png"
                                                 alt="profile" class="w-100"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 px-3 gallery-vcard-position">
                            <div class="card shadow-product w-100 border-0 h-100 shadow-gallery">             
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

            {{--product--}}

            <div class="container">
                <div class="product-main-section pb-4">
                    <div class="header-product">
                        <h2 class="mb-4 text-center">Products</h2>
                    </div>
                    <div class="row product-vcard d-flex justify-content-center g-3">
                        <div class="col-6 px-3">
                            <div class="card shadow-product w-100 border-0 h-100">
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
                        <div class="col-6 px-3">
                            <div class="card shadow-product w-100 border-0 h-100">
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
                        <div class="col-6 px-3">
                            <div class="card shadow-product w-100 border-0 h-100">
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
                <div class="testimonial-main-section pb-4">
                    <div class="header-testimonial">
                        <h2 class="mb-4 text-center">Testimonial</h2>
                    </div>
                    <div class="row testimonial-vcard d-flex justify-content-center g-3">
                        <div class="col-12 px-4">
                            <div class="card shadow-testi w-100 border-0">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center testimonial-box">
                                        <img src="{{asset('assets/img/vcard7/testilogo.png')}}"
                                             class="testi-logo rounded-circle"/>
                                        <div class="my-2">
                                            <p class="mb-0 description-testi text-sm-start">There are many variations of
                                                passages of Lorem
                                                Ipsum available, but the majority have suffered
                                                alteration in some form.</p>
                                            <span class="testi-footer-title">- Kartik Aryan - CEO at Kingstone</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-4">
                            <div class="card shadow-testi w-100 border-0">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center testimonial-box">
                                        <img src="{{asset('assets/img/vcard7/testilogo.png')}}"
                                             class="testi-logo rounded-circle"/>
                                        <div class="my-2">
                                            <p class="mb-0 description-testi text-sm-start">There are many variations of
                                                passages of Lorem
                                                Ipsum available, but the majority have suffered
                                                alteration in some form.</p>
                                            <span class="testi-footer-title">- Kartik Aryan - CEO at Kingstone</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- blog--}}
            <div class="container vcard-seven-blog">
                <h2 class="mb-4 text-center">Blog</h2>
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
                                <div class="blog-details mt-5">
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
                                <div class="blog-details mt-5">
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

            {{--Qrcode--}}
            <div class="container mt-4 mb-5">
                <div class="main-Qr-section mb-5">
                    <div class="qr-header-title">
                        <h3 class="mb-4 text-center">QR Code</h3>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-6">
                            <div class="text-center mb-4">
                                <img src="{{asset('assets/img/qrcode.png')}}" class="qr-img"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="text-center">
                                <div class="qr-section">
                                    <img src="{{asset('assets/img/newgirl.png')}}"
                                         class="qr-logo rounded-circle"/>
                                </div>
                                <div class="mt-4">
                                    <button type="button" class="btn btn-lg Qr-btn">Download My QR Code
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--business hour--}}

            <div class="container">
                <div class="business-main-section">
                    <h3 class="text-center mb-4">Business Hour</h3>
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-8">
                            <div class="hour-info text-center">
                                <div class="business-day mb-3">
                                    <p class="mb-0">Sunday : 08:10 - 20:00</p>
                                </div>
                                <div class="business-day mb-3">
                                    <p class="mb-0">Monday : 08:10 - 20:00</p>
                                </div>
                                <div class="business-day mb-3">
                                    <p class="mb-0">Tuesday : 08:10 - 20:00</p>
                                </div>
                                <div class="business-day mb-3">
                                    <p class="mb-0">Wednesday : 08:10 - 20:00</p>
                                </div>
                                <div class="business-day mb-3">
                                    <p class="mb-0">Thursday : 08:10 - 20:00</p>
                                </div>
                                <div class="business-day mb-3">
                                    <p class="mb-0">Friday : 08:10 - 20:00</p>
                                </div>
                                <div class="business-day mb-3">
                                    <p class="mb-0">Saturday : Closed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--contact us--}}
            <div class="container mt-3 mb-3">
                <div class="contactus-section position-relative">
                    <h3 class="text-center mb-4">Contact Us</h3>
                    <div class="main-contact">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label for="basic-url" class="form-label mb-0">Your Name</label>
                                    <div class="col-12 mb-3 input-group">
                                    <span class="input-group-text contact-icon bg-transparent border-end-0"
                                          id="basic-addon1"><i
                                            class="far fa-user"></i></span>
                                        <input type="text"
                                               class="form-control contact-input bg-transparent border-start-0"
                                               id="inputAddress" placeholder="Full Name">
                                    </div>

                                    <label for="basic-url" class="form-label mb-0">E-mail</label>
                                    <div class="col-12 mb-3 input-group">
                                    <span class="input-group-text contact-icon border-end-0 bg-transparent"
                                          id="basic-addon1"><i
                                            class="far fa-envelope"></i></span>
                                        <input type="text"
                                               class="form-control contact-input border-start-0 bg-transparent"
                                               id="inputAddress" placeholder="E-mail Address">
                                    </div>

                                    <label for="inputAddress" class="form-label mb-0">Phone</label>
                                    <div class="col-12 mb-3 input-group">
                                    <span class="input-group-text contact-icon border-end-0 bg-transparent"
                                          id="basic-addon1"><i
                                            class="fas fa-phone"></i></span>
                                        <input type="text"
                                               class="form-control contact-input border-start-0 bg-transparent"
                                               id="inputAddress" placeholder="Mobile Number">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label mb-0">Your
                                            Message</label>
                                        <textarea class="form-control contact-input bg-transparent"
                                                  id="exampleFormControlTextarea1"
                                                  rows="7" placeholder="Type a Message..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-3">
                                <button type="button" class="btn contact-btn px-4">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-sm-flex justify-content-center mt-5">
                    <button type="submit" class="vcard-seven-btn mt-4 d-block btn">
                        <i class="fas fa-download me-2"></i> Download Vcard
                    </button>
                    {{--share btn--}}
                    <button type="button" class="share-btn d-block btn mt-4 ms-sm-3">
                        <a href="#" class="text-decoration-none">
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
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
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
