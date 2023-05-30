<html lang="en">
<head>
    <link>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>vcard</title>

    {{--css link--}}
    <link rel="stylesheet" href="{{ asset('assets/css/vcard1.css')}}">

    {{--slick slider--}}
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">


    {{--google font--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
<div class="container">
    <div class="vcard-one main-content w-100 mx-auto">
        {{--banner--}}
        <div class="vcard-one__banner w-100 position-relative">
            <img src="{{asset('assets/img/vcard1/vcard-one-bg.png')}}" class="img-fluid" alt="background image"/>

            <div class="d-flex justify-content-end position-absolute top-0 end-0 me-3">
                <div class="language pt-4 me-2">
                    <ul class="text-decoration-none">
                        <li class="dropdown1 dropdown lang-list">
                            <a class="dropdown-toggle lang-head text-decoration-none" data-toggle="dropdown"
                               role="button"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-language me-2"></i>Language</a>
                            <ul class="dropdown-menu start-0 lang-hover-list top-100 image-icon">
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
        <div class="vcard-one__profile position-relative">
            <div class="avatar position-absolute top-0 start-50 translate-middle">
                <img src="{{asset('assets/img/vcard1/vcard1-profile.png')}}" alt="profile-img" class="rounded-circle"/>
            </div>
        </div>
        {{--profile details--}}
        <div class="vcard-one__profile-details py-3 d-flex flex-column align-items-center justify-content-center px-3">
            <h4 class="profile-name pt-2 mb-0">Kishan Savaliya</h4>
            <span class="profile-designation pt-2 fw-light">A Freelance Web Designer</span>
            <span class="mt-4 profile-description"> I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery</span>
            <div class="social-icons d-flex justify-content-center pt-4">
                <i class="fab fa-facebook facebook-icon icon me-sm-4 me-2 fa-2x"></i>
                <i class="fab fa-instagram instagram-icon icon mx-sm-4 mx-3 fa-2x"></i>
                <i class="fab fa-linkedin-in linkedin-icon icon mx-sm-4 mx-3 fa-2x"></i>
                <i class="fab fa-whatsapp whatsapp-icon icon mx-sm-4 mx-3 fa-2x"></i>
                <i class="fab fa-twitter twitter-icon icon ms-sm-4 ms-2 fa-2x"></i>
            </div>
         
        </div>
        {{--event--}}
        <div class="vcard-one__event py-3 px-3">
            <div class="container">
                <div class="row g-3">
                    <div class="col-sm-6 col-12">
                        <div class="card event-card p-3 h-100 border-0">
                                 <span class="event-icon d-flex justify-content-center">
                                    <img src="{{asset('assets/img/vcard1/vcard1-email.png')}}" alt="email"/>
                                 </span>
                            <h6 class="event-name text-center pt-3 mb-0">sly.watson@gmail.com</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card event-card p-3 h-100 border-0">
                                 <span class="event-icon d-flex justify-content-center">
                                    <img src="{{asset('assets/img/vcard1/vcard1-birthday.png')}}" alt="email"/>
                                 </span>
                            <h6 class="event-name text-center pt-3 mb-0">30 October 1997</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card event-card p-3 h-100 border-0">
                                 <span class="event-icon d-flex justify-content-center">
                                    <img src="{{asset('assets/img/vcard1/vcard1-phone.png')}}" alt="email"/>
                                 </span>
                            <h6 class="event-name text-center pt-3 mb-0">+ 91 99746 99793</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card event-card p-3 h-100 border-0">
                                 <span class="event-icon d-flex justify-content-center">
                                    <img src="{{asset('assets/img/vcard1/vcard1-location.png')}}" alt="email"/>
                                 </span>
                            <h6 class="event-name text-center pt-3 mb-0">Melbourne - Australia</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Appointment--}}
        <div class="vcard-one__appointment py-3">
            <h4 class="vcard-one-heading text-center pb-4">Make an Appointment</h4>
            <div class="container px-4">
                <div class="appointment-one">
                    <div class="row d-flex align-items-center justify-content-center mb-3">
                        <div class="col-md-2">
                            <label for="date" class="me-4 appoint-date mb-2">Date</label>
                        </div>
                        <div class="col-md-10">
                            <input id="myID" type="text" class="appoint-input mb-2" placeholder="Pick a Date"/>
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
        <div class="vcard-one__service my-3 py-5">
            <h4 class="vcard-one-heading text-center pb-4">Our Services</h4>
            <div class="container">
                <div class="row g-3">
                    <div class="col-sm-6 col-12">
                        <div class="card service-card d-flex align-items-center flex-row p-2 border-0 h-100">
                            <div class="service-image d-flex justify-content-center align-items-center rounded-circle">
                                <img src="{{asset('assets/img/vcard1/service1.png')}}" alt="Ui/Ux"/>
                            </div>
                            <div class="service-details ms-3">
                                <h4 class="service-title">UI/UX</h4>
                                <p class="service-paragraph mb-0">
                                    Landing Page User Flow, Wireframing Prototyping mobile app design
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card service-card d-flex align-items-center flex-row p-2 border-0 h-100">
                            <div class="service-image d-flex justify-content-center align-items-center rounded-circle">
                                <img src="{{asset('assets/img/vcard1/service2.png')}}" alt="Icons"/>
                            </div>
                            <div class="service-details ms-3">
                                <h4 class="service-title">Icons</h4>
                                <p class="service-paragraph mb-0">
                                    Character Desiggn Icon sot, Illustration Guide, illustaration Sat.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card service-card d-flex align-items-center flex-row p-2 border-0 h-100">
                            <div class="service-image d-flex justify-content-center align-items-center rounded-circle">
                                <img src="{{asset('assets/img/vcard1/service3.png')}}" alt="Branding"/>
                            </div>
                            <div class="service-details ms-3">
                                <h4 class="service-title">Branding</h4>
                                <p class="service-paragraph mb-0">
                                    Landing Page User Flow, Wireframing Prototyping mobile app design
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card service-card d-flex align-items-center flex-row p-2 border-0 h-100">
                            <div class="service-image d-flex justify-content-center align-items-center rounded-circle">
                                <img src="{{asset('assets/img/vcard1/service4.png')}}" alt="App Design"/>
                            </div>
                            <div class="service-details ms-3">
                                <h4 class="service-title">App Design</h4>
                                <p class="service-paragraph mb-0">
                                    Character Desiggn Icon sot, Illustration Guide, illustaration Sat.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card service-card d-flex align-items-center flex-row p-2 border-0 h-100">
                            <div class="service-image d-flex justify-content-center align-items-center rounded-circle">
                                <img src="{{asset('assets/img/vcard1/service5.png')}}" alt="Motion"/>
                            </div>
                            <div class="service-details ms-3">
                                <h4 class="service-title">Motion</h4>
                                <p class="service-paragraph mb-0">
                                    Landing Page User Flow, Wireframing Prototyping mobile app design
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card service-card d-flex align-items-center flex-row p-2 border-0 h-100">
                            <div class="service-image d-flex justify-content-center align-items-center rounded-circle">
                                <img src="{{asset('assets/img/vcard1/service6.png')}}" alt="Development"/>
                            </div>
                            <div class="service-details ms-3">
                                <h4 class="service-title">Development</h4>
                                <p class="service-paragraph mb-0">
                                    Character Desiggn Icon sot, Illustration Guide, illustaration Sat.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--gallery--}}

        <div class="vcard-one__gallery py-3">
            <h4 class="vcard-one-heading text-center pb-4">Gallery</h4>
            <div class="container">
                <div class="row g-4 gallery-slider overflow-hidden">
                    <div class="col-6 mb-2 gallery-vcard-position">
                        <div class="card gallery-card product-card p-2 border-0 w-100 h-100">
                            <div class="gallery-profile">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2 gallery-vcard-position">
                        <div class="card gallery-card product-card p-2 border-0 w-100 h-100">
                            <div class="gallery-profile">
                                <div>
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                       class="gallery-link">
                                        <div class="gallery-item"
                                             style="background-image: url(&quot;https://vcard.waptechy.com/assets/img/video-thumbnail.png&quot;)">
                                        </div>
                                    </a>
                                </div>
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

        {{--Product slider--}}
        <div class="vcard-one__product py-3">
            <h4 class="vcard-one-heading text-center pb-4">Products</h4>
            <div class="container">
                <div class="row g-4 product-slider overflow-hidden">
                    <div class="col-6 mb-2">
                        <div class="card product-card p-2 border-0 w-100 h-100 product-template-block">
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
                    <div class="col-6 mb-2">
                        <div class="card product-card p-2 border-0 w-100 h-100 product-template-block">
                            <div class="product-profile">
                                <img src="{{asset('assets/img/vcard1/v2.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="product-details mt-3">
                                <h4>Laptop</h4>
                                <p class="mb-2">
                                    DELL Inspiron Core i3 11th Gen
                                </p>
                                <span class="text-black">$200</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="card product-card p-2 border-0 w-100 h-100 product-template-block">
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
        <div class="vcard-one__testimonial py-3">
            <h4 class="vcard-one-heading text-center pb-4">Testimonial</h4>
            <div class="container">
                <div class="row g-4 pt-5 testimonial-slider overflow-hidden">
                    <div class="col-6">
                        <div class="card testimonial-card position-relative p-2 border-0 w-100">
                            <div class="testimonial-profile position-absolute top-0 start-50 translate-middle">
                                <img src="{{asset('assets/img/vcard1/vcard1-profile.png')}}" alt="profile"
                                     class="rounded-circle m-auto"/>
                            </div>
                            <div class="testimonial-details mt-5">
                                <h4 class="text-center">Melten Lopher</h4>
                                <span class="text-center d-block mb-2">CEO at Codexr</span>
                                <p class="text-center">
                                    Lorem Ipsum is simply dummy
                                    text of the printing and typesetting
                                    industry. Lorem Ipsum has been the
                                    industry's standard dummy text
                                    ever since the 1500s, when an
                                    unknown printer took a galley of
                                    type and scrambled it to make a
                                    type specimen book.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card testimonial-card position-relative p-2 border-0 w-100">
                            <div class="testimonial-profile position-absolute top-0 start-50 translate-middle">
                                <img src="{{asset('assets/img/vcard1/vcard1-profile.png')}}" alt="profile" class="rounded-circle m-auto"/>
                            </div>
                            <div class="testimonial-details mt-5">
                                <h4 class="text-center">Melten Lopher</h4>
                                <span class="text-center d-block mb-2">CEO at Codexr</span>
                                <p class="text-center">
                                    Lorem Ipsum is simply dummy
                                    text of the printing and typesetting
                                    industry. Lorem Ipsum has been the
                                    industry's standard dummy text
                                    ever since the 1500s, when an
                                    unknown printer took a galley of
                                    type and scrambled it to make a
                                    type specimen book.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- blog--}}
        <div class="vcard-one__blog py-3">
            <h4 class="vcard-one-heading text-center pb-4">Blog</h4>
            <div class="container">
                <div class="row g-4 blog-slider overflow-hidden">
                    <div class="col-6 mb-2">
                        <div class="card blog-card p-2 border-0 w-100 h-100 flex-sm-row">
                            <div class="blog-image">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="blog-details ms-sm-5 mt-sm-0 mt-5">
                                <h4 class="text-sm-start text-center">men's Wear</h4>
                                <p class="mb-2 text-sm-start text-center">
                                    Men Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal Suit
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="card blog-card p-2 border-0 w-100 h-100 flex-sm-row">
                            <div class="blog-image">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="blog-details ms-sm-5 mt-sm-0 mt-5">
                                <h4 class="text-sm-start text-center">men's Wear</h4>
                                <p class="mb-2 text-sm-start text-center">
                                    Men Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal Suit
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="card blog-card p-2 border-0 w-100 h-100 flex-sm-row">
                            <div class="blog-image">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="blog-details ms-sm-5 mt-sm-0 mt-5">
                                <h4 class="text-sm-start text-center">men's Wear</h4>
                                <p class="mb-2 text-sm-start text-center">
                                    Men Regular Formal SuitMen Regular Formal SuitMen
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Qr code--}}
        <div class="vcard-one__qr-code my-3 py-5 px-3">
            <h4 class="vcard-one-heading text-center pb-4">QR Code</h4>
            <div class="qr-code p-3 card d-block mx-auto border-0">

                <div class="qr-code-image d-flex justify-content-center">
                    <img src="{{asset('assets/img/vcard1/vcard-qr.png')}}" alt="qr code"/>
                </div>
            </div>
            <button type="button" class="qr-code-btn text-white mt-4 d-block mx-auto">Download My QR Code</button>
        </div>
        {{--business hour--}}
        <div class="vcard-one__timing py-3 px-1">
            <h4 class="vcard-one-heading text-center pb-4">Business Hours</h4>
            <div class="container pb-4">
                <div class="row g-3">
                    <div class="col-sm-6 col-12">
                        <div class="card business-card flex-row justify-content-center">
                            <span class="me-2">Sunday :</span>
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card business-card flex-row justify-content-center">
                            <span class="me-2">Monday :</span>
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card business-card flex-row justify-content-center">
                            <span class="me-2">Tuesday :</span>
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card business-card flex-row justify-content-center">
                            <span class="me-2">Wednesday :</span>
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card business-card flex-row justify-content-center">
                            <span class="me-2">Thursday :</span>
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card business-card flex-row justify-content-center">
                            <span class="me-2">Friday :</span>
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card business-card flex-row justify-content-center">
                            <span class="me-2">Saturday :</span>
                            <span>08:10 - 20:00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--Contact--}}
        <div class="vcard-one__contact py-5">
            <h4 class="vcard-one-heading text-center pb-4">Contact Us</h4>
            <div class="contact-form px-3">
                <div class="mb-3">
                    <label class="form-label">Your Name</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text border-end-0"><i class="far fa-user"></i></span>
                        <input type="text" class="form-control border-start-0" placeholder="Full Name">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text border-end-0"><i class="far fa-envelope"></i></span>
                        <input type="email" class="form-control border-start-0" placeholder="E-mail Address">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text border-end-0"><i class="fas fa-phone"></i></span>
                        <input type="tel" placeholder="Mobile Number" class="form-control border-start-0">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" placeholder="Type a message here..." id="message"
                              rows="5"></textarea>
                </div>
                <button type="button" class="contact-btn text-white mt-4 d-block ms-auto">Send Message</button>
            </div>
            <div class="d-sm-flex justify-content-center mt-5">
                <button type="submit" class="vcard-one-btn text-white d-block mb-sm-0 mb-3">
                    <i class="fas fa-download me-2"></i> Download Vcard
                </button>
                {{--share btn--}}
                <button type="button" class="share-btn text-white d-block btn">
                    <a href="#" class="text-white text-decoration-none">
                        <i class="fas fa-share-alt me-2"></i> Share</a>
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
<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/front-third-party.js') }}"></script>
<script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $('.testimonial-slider').slick({
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
