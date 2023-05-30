<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">

    <title>Vcard-6</title>


    {{--css link--}}
    <link rel="stylesheet" href="{{ asset('assets/css/vcard6.css')}}">

    {{--slick slider--}}
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>
<body>

<div class="container main-section">
    <div class="row d-flex justify-content-center">
        <div class="main-bg p-0">
            
            <div class="head-img position-relative">
                <img src="{{asset('assets/img/vcard6/bgvcard.png')}}" height="400px" class="img-fluid"/>
                
                <div class="d-flex justify-content-end position-absolute top-0 end-0 me-3">
                    <div class="language pt-3 me-2">
                        <ul class="text-decoration-none">
                            <li class="dropdown1 dropdown lang-list">
                                <a class="dropdown-toggle lang-head text-decoration-none" data-toggle="dropdown"
                                   role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-language me-2"></i>Language</a>
                                <ul class="dropdown-menu start-0 lang-hover-list image-icon top-100">
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

            <div class="position-relative">
                <img src="{{asset('assets/img/vcard6/Triangle.png')}}"
                     class="img-fluid position-absolute triangle-img"/>
                <img src="{{asset('assets/img/vcard6/circle.png')}}" class="img-fluid position-absolute circle-img"/>
                <img src="{{asset('assets/img/vcard6/triangledown.png')}}"
                     class="img-fluid position-absolute triangle-down-img"/>
                <img src="{{asset('assets/img/vcard6/Oval.png')}}" class="img-fluid position-absolute oval-img"/>

                <div class="container">
                    <div class="main-profile position-relative">
                        <div class="profile-img">
                            <div class="row d-flex align-items-center mb-4 justify-content-center">
                                <div class="col-md-4">
                                    <img src="{{asset('assets/img/vcard6/profile.jpg')}}"
                                         class="pro-img img-fluid position-relative"/>
                                </div>
                                <div class="col-md-8">
                                    <div>
                                        <h3 class="big-title text-light">Luccy Morries</h3>
                                        <p class="small-title text-light">a full stack developer</p>
                                    </div>
                                    
                                    <div class="social-section">
                                        <div class="social-icon d-flex">
                                            <div class="pro-icon me-2">
                                                <i class="fab fa-facebook-f"></i>
                                            </div>
                                            <div class="pro-icon mx-2">
                                                <i class="fab fa-whatsapp"></i>
                                            </div>
                                            <div class="pro-icon mx-2">
                                                <i class="fab fa-linkedin-in"></i>
                                            </div>
                                            <div class="pro-icon ms-2">
                                                <i class="fab fa-instagram"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="pt-2 px-2 profile-description" > I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-4">
                                    <div class="card border-0 bg-transparent">
                                        <div class="event-icon text-white">
                                            <img src="{{asset('assets/img/vcard6/email.png')}}" class="img-fluid me-3"/>
                                            <span>mluccy@gmail.com</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <div class="card border-0 bg-transparent">
                                        <div class="event-icon text-white">
                                            <img src="{{asset('assets/img/vcard6/call.png')}}" class="img-fluid me-3"/>
                                            <span>+91 9664652746</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <div class="card border-0 bg-transparent">
                                        <div class="event-icon text-white">
                                            <img src="{{asset('assets/img/vcard6/cake.png')}}" class="img-fluid me-3"/>
                                            <span>20-january-1997</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <div class="card border-0 bg-transparent">
                                        <div class="event-icon text-white">
                                            <img src="{{asset('assets/img/vcard6/location.png')}}"
                                                 class="img-fluid me-3"/>
                                            <span>Surat-india</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--appointment--}}
            <div class="container pt-5">
                <div class="appointment">
                    <h3 class="appointment-heading mb-4 position-relative text-center text-white">Make an
                        Appointment</h3>
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

                    <button type="button" class="appoint-btn mt-4 d-block mx-auto btn btn-lg">Make an Appointment
                    </button>
                </div>
            </div>

            {{--our-section--}}

            <div class="main-service-our position-relative">
                <img src="{{asset('assets/img/vcard6/smalltriangle.png')}}"
                     class="img-fluid position-absolute smalltriangle-img"/>
                <img src="{{asset('assets/img/vcard6/pinkoval.png')}}"
                     class="img-fluid position-absolute pinkoval-img"/>
                <img src="{{asset('assets/img/vcard6/redoval.png')}}" class="img-fluid position-absolute redoval-img"/>
                <img src="{{asset('assets/img/vcard6/blueoval.png')}}"
                     class="img-fluid position-absolute blueoval-img"/>
                <img src="{{asset('assets/img/vcard6/box.png')}}" class="img-fluid position-absolute box-img"/>

                <div class="container py-5">
                    <div class="main-our-section position-relative">
                        <h3 class="text-center mb-4 text-light">Our Services</h3>
                        <div class="row">
                            <div class="col-md-6 text-light">
                                <div class="our-img mb-3">
                                    <img src="{{asset('assets/img/vcard6/design.png')}}" class="img-fluid me-3"/>
                                </div>
                                <div>
                                    <h5 class="our-heading mb-0">Web Design</h5>
                                    <p class="our-title">There are many variations of passages
                                        of Lorem Ipsum available, but the
                                        majority have suffered.</p>
                                </div>
                            </div>

                            <div class="col-md-6 text-light">
                                <div class="our-img mb-3">
                                    <img src="{{asset('assets/img/vcard6/uidesign.png')}}" class="img-fluid me-3"/>
                                </div>
                                <div>
                                    <h5 class="our-heading mb-0">UI Design</h5>
                                    <p class="our-title">There are many variations of passages
                                        of Lorem Ipsum available, but the
                                        majority have suffered.</p>
                                </div>
                            </div>

                            <div class="col-md-6 text-light">
                                <div class="our-img mb-3">
                                    <img src="{{asset('assets/img/vcard6/design.png')}}" class="img-fluid me-3"/>
                                </div>
                                <div>
                                    <h5 class="our-heading mb-0">Web Design</h5>
                                    <p class="our-title">There are many variations of passages
                                        of Lorem Ipsum available, but the
                                        majority have suffered.</p>
                                </div>
                            </div>

                            <div class="col-md-6 text-light">
                                <div class="our-img mb-3">
                                    <img src="{{asset('assets/img/vcard6/uidesign.png')}}" class="img-fluid me-3"/>
                                </div>
                                <div>
                                    <h5 class="our-heading mb-0">UI Design</h5>
                                    <p class="our-title">There are many variations of passages
                                        of Lorem Ipsum available, but the
                                        majority have suffered.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--gallery--}}
            <div class="main-gallery position-relative">
                <img src="{{asset('assets/img/vcard6/testioval.png')}}"
                     class="img-fluid position-absolute testioval-img"/>
                <img src="{{asset('assets/img/vcard6/testiright.png')}}"
                     class="img-fluid position-absolute testiright-img"/>
                <img src="{{asset('assets/img/vcard6/bluetesti.png')}}"
                     class="img-fluid position-absolute bluetesti-img"/>
                <img src="{{asset('assets/img/vcard6/circle.png')}}"
                     class="img-fluid position-absolute circletesti-img"/>
                <img src="{{asset('assets/img/vcard6/circle.png')}}" class="img-fluid position-absolute circle2-img"/>

                <div class="container mt-3 mb-5">
                    <h3 class="text-center mb-4 text-light">Gallery</h3>
                    <div class="gallery-section position-relative">
                        <div class="row g-3 gallery-card">
                            <div class="col-6">
                                <div class="card w-100 h-100 bg-transparent border-0 text-light">
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
                                <div class="card w-100 h-100 bg-transparent border-0 text-light">
                                    <div class="gallery-profile">
                                        <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                                    </div>
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

            <div class="main-product position-relative">
                <img src="{{asset('assets/img/vcard6/testioval.png')}}"
                     class="img-fluid position-absolute testioval-img"/>
                <img src="{{asset('assets/img/vcard6/testiright.png')}}"
                     class="img-fluid position-absolute testiright-img"/>
                <img src="{{asset('assets/img/vcard6/bluetesti.png')}}"
                     class="img-fluid position-absolute bluetesti-img"/>
                <img src="{{asset('assets/img/vcard6/circle.png')}}"
                     class="img-fluid position-absolute circletesti-img"/>
                <img src="{{asset('assets/img/vcard6/circle.png')}}" class="img-fluid position-absolute circle2-img"/>

                <div class="container mt-3 mb-5">
                    <h3 class="text-center mb-4 text-light">Products</h3>
                    <div class="product-section position-relative">
                        <div class="row g-3 product-card">
                            <div class="col-6">
                                <div class="card  w-100 h-100 bg-transparent border-0 text-light">
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
                                <div class="card w-100 h-100 bg-transparent border-0 text-light">
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
                                <div class="card w-100 h-100 bg-transparent border-0 text-light">
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
            </div>

            {{--testimonial--}}
            <div class="main-testimonial position-relative">
                <img src="{{asset('assets/img/vcard6/testioval.png')}}"
                     class="img-fluid position-absolute testioval-img"/>
                <img src="{{asset('assets/img/vcard6/testiright.png')}}"
                     class="img-fluid position-absolute testiright-img"/>
                <img src="{{asset('assets/img/vcard6/bluetesti.png')}}"
                     class="img-fluid position-absolute bluetesti-img"/>
                <img src="{{asset('assets/img/vcard6/circle.png')}}"
                     class="img-fluid position-absolute circletesti-img"/>
                <img src="{{asset('assets/img/vcard6/circle.png')}}" class="img-fluid position-absolute circle2-img"/>

                <div class="container mt-3 mb-5">
                    <h3 class="text-center mb-4 text-light">Testimonial</h3>
                    <div class="testimonial-section position-relative">
                        <div class="row g-3 testimonial-card">
                            <div class="col-6">
                                <div class="card  w-100 h-100 bg-transparent border-0 text-light">
                                    <img src="{{asset('assets/img/vcard6/testigirl.png')}}"
                                         class="testimonial-image d-block mx-auto"/>
                                    <div>
                                        <p class="mb-0 text-center pt-3 testi-details">
                                            “Inside Casey’s head is a seemingly
                                            inexhaustible font of ideas which he uses to reliably surprise and delight
                                            me with every creative design challenge.”
                                        </p>
                                    </div>
                                    <div
                                        class="testimonial-user d-flex justify-content-center flex-column align-center mt-3">
                                        <h5 class="user-name text-center position-relative mt-2 mb-0">Richard Moor</h5>
                                        <span class="user-designation text-center">CEO Founder at coinbase.com</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card w-100 h-100 bg-transparent border-0 text-light">
                                    <img src="{{asset('assets/img/vcard6/testigirl-2.png')}}"
                                         class="testimonial-image d-block mx-auto"/>
                                    <div>
                                        <p class="mb-0 text-center pt-3 testi-details">
                                            “By far the easiest graphic designer I’ve had the pleasure of working with.
                                            He was very insightful from the beginning”
                                        </p>
                                    </div>
                                    <div
                                        class="testimonial-user d-flex justify-content-center flex-column align-center mt-3">
                                        <h5 class="user-name text-center position-relative mt-2 mb-0">Donald
                                            Bridges</h5>
                                        <span class="user-designation text-center">CEO Founder at switchcoin Tech</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card w-100 h-100 bg-transparent border-0 text-light">
                                    <img src="{{asset('assets/img/vcard6/testigirl-2.png')}}"
                                         class="testimonial-image d-block mx-auto"/>
                                    <div>
                                        <p class="mb-0 text-center pt-3 testi-details">
                                            “By far the easiest graphic designer I’ve had the pleasure of working with.
                                            He was very insightful from the beginning”
                                        </p>
                                    </div>
                                    <div
                                        class="testimonial-user d-flex justify-content-center flex-column align-center mt-3">
                                        <h5 class="user-name text-center position-relative mt-2 mb-0">Donald
                                            Bridges</h5>
                                        <span class="user-designation text-center">CEO Founder at switchcoin Tech</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- blog--}}
            <div class="vcard-six-blog py-3 position-relative">
                <img src="{{asset('assets/img/vcard6/bluetesti.png')}}"
                     class="img-fluid position-absolute bluetesti-img"/>
                <img src="{{asset('assets/img/vcard6/circle.png')}}"
                     class="img-fluid position-absolute circletesti-img"/>
                <h3 class="text-center mb-4 text-light">Blog</h3>
                <div class="container">
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

            {{--Qr code--}}
            <div class="main-qrcode position-relative pt-4">
                <img src="{{asset('assets/img/vcard6/orengcircle.png')}}"
                     class="img-fluid position-absolute orengcircle-img"/>
                <img src="{{asset('assets/img/vcard6/uptriangle.png')}}"
                     class="img-fluid position-absolute uptriangle-img"/>
                <img src="{{asset('assets/img/vcard6/halfcircle.png')}}"
                     class="img-fluid position-absolute halfcircle-img"/>
                <img src="{{asset('assets/img/vcard6/orengtriangle.png')}}"
                     class="img-fluid position-absolute orengtriangle-img"/>
                <img src="{{asset('assets/img/vcard6/halfblue.png')}}" class="img-fluid position-absolute circle2-img"/>

                <div class="container mt-3 mb-5">
                    <div class="main-Qr-section mb-5">
                        <div class="qr-header-title">
                            <h3 class="mb-4 text-center text-light">QR Code</h3>
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-6">
                                <div class="text-center mb-4">
                                    <img src="{{asset('assets/img/vcard6/qrcode.png')}}" class="qr-img"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="text-center">
                                    <img src="{{asset('assets/img/newgirl.png')}}"
                                         class="qr-logo rounded-circle"/>
                                    <div class="mt-4">
                                        <button type="button" class="btn btn-lg Qr-btn">Download My QR Code
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--business hour --}}
            <div class="main-businesshour position-relative pt-4">
                <img src="{{asset('assets/img/vcard6/yellowcircle.png')}}"
                     class="img-fluid position-absolute yellowoval-img"/>
                <img src="{{asset('assets/img/vcard6/bigbox.png')}}"
                     class="img-fluid position-absolute orangecircle-img"/>
                <img src="{{asset('assets/img/vcard6/leftblue.png')}}"
                     class="img-fluid position-absolute leftblue-img"/>

                <div class="container mt-3 mb-5">
                    <div class="main-business position-relative">
                        <h3 class="text-center text-light mb-4">Business Hour</h3>
                        <div class="row justify-content-center">
                            <div class="col-sm-8 text-light">
                                <div class="hour-info text-center">
                                    <p>Sunday : 08:10 - 20:00</p>
                                    <p>Monday : 08:10 - 20:00</p>
                                    <p>Tuesday : 08:10 - 20:00</p>
                                    <p>Wednesday : 08:10 - 20:00</p>
                                    <p>Thursday : 08:10 - 20:00</p>
                                    <p>Friday : 08:10 - 20:00</p>
                                    <p>Saturday : Closed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--contact us--}}

            <div class="main-contactus position-relative pt-sm-5">
                <img src="{{asset('assets/img/vcard6/lightyellow.png')}}"
                     class="img-fluid position-absolute lightyellow-img"/>
                <img src="{{asset('assets/img/vcard6/smallpink.png')}}"
                     class="img-fluid position-absolute smallpink-img"/>
                <img src="{{asset('assets/img/vcard6/lighttraingle.png')}}"
                     class="img-fluid position-absolute light-img"/>
                <img src="{{asset('assets/img/vcard6/smallblue.png')}}"
                     class="img-fluid position-absolute smallblue-img"/>
                <img src="{{asset('assets/img/vcard6/halfbox.png')}}" class="img-fluid position-absolute halfbox-img"/>

                <div class="container mt-3 mb-3">
                    <div class="contactus-section position-relative">
                        <h3 class="text-center text-light mb-4">Contact Us</h3>
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
                                    <span class="input-group-text bg-transparent contact-icon border-end-0"
                                          id="basic-addon1"><i
                                            class="far fa-envelope" ></i></span>
                                            <input type="text"
                                                   class="form-control contact-input border-start-0 bg-transparent"
                                                   id="inputAddress" placeholder="E-mail Address">
                                        </div>

                                        <label for="inputAddress" class="form-label mb-0">Phone</label>
                                        <div class="col-12 mb-3 input-group">
                                    <span class="input-group-text bg-transparent contact-icon border-end-0"
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
                </div>

                <div class="d-sm-flex justify-content-center mt-5">
                    <button type="submit" class="vcard-six-btn mt-4 mb-3 d-block btn">
                        <i class="fas fa-download me-2"></i> Download Vcard
                    </button>
                    {{--share btn--}}
                    <button type="button" class="share-btn d-block btn mt-4 mb-3 ms-sm-3">
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
    $('.testimonial-card').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 2,
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
    $('.product-card').slick({
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
    $('.gallery-card').slick({
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
