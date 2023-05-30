<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
   <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">

    <title>Vcard4 Theme</title>

    {{--css link--}}
    <link rel="stylesheet" href="{{ asset('assets/css/vcard4.css')}}">

    {{--slick slider--}}
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>
<body>
<div class="container">
    <div class="main-content vcard w-100 mx-auto">
       
        <div class="vcard__banner w-100 position-relative">
            <img src="{{asset('assets/img/vcard3/vcard3-banner.png')}}" alt="banner"/>

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
        <div class="vcard__profile d-flex align-items-center px-4 flex-sm-row flex-column">
            <div class="vcard__avatar">
                <img src="{{asset('assets/img/vcard4/profile.png')}}" class="rounded-circle"/>
            </div>
            <div class="vcard__position d-flex flex-column mx-4 mt-sm-5 mt-2">
                <div class="d-flex flex-column">
                    <span class="avatar-name fw-bold text-sm-start text-center">Alexa Nairobi</span>
                    <span class="avatar-designation text-sm-start text-center">Frontend Developer</span>
          
                </div>
                <div class="vcard__social d-flex mt-3">
                    <span class="icons rounded-circle d-flex justify-content-center align-items-center my-2 me-2">
                        <i class="fab fa-facebook-f"></i>
                    </span>
                    <span class="icons rounded-circle d-flex justify-content-center align-items-center m-2">
                       <i class="fab fa-whatsapp"></i>
                    </span>
                    <span class="icons rounded-circle d-flex justify-content-center align-items-center m-2">
                        <i class="fab fa-linkedin"></i>
                    </span>
                    <span class="icons rounded-circle d-flex justify-content-center align-items-center my-2 ms-2">
                        <i class="fab fa-instagram"></i>
                    </span>
                </div>

            </div>
            
        </div>
        
        <div class="d-flex align-items-center">
        <span class="pt-2 px-2 profile-description"> I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery</span>
        </div>
        {{--details--}}
        <div class="px-4 my-3">
            <div class="vcard__event">
                <div class="row py-4 g-3">
                    <div class="col-sm-6 col-12">
                        <div class="card vcard__event-card d-flex flex-column justify-content-center align-items-center border-0 p-3 h-100">
                            <span class="event-icon">
                                <img src="{{ asset('assets/img/vcard4/email.png') }}" class="img-fluid">
                            </span>
                            <span class="event-name pt-2">mluccy@gmail.com</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card vcard__event-card d-flex flex-column justify-content-center align-items-center border-0 p-3 h-100">
                            <span class="event-icon">
                                <img src="{{ asset('assets/img/vcard4/birthday.png') }}" class="img-fluid">
                            </span>
                            <span class="event-name pt-2">30 - october 1997</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card vcard__event-card d-flex flex-column justify-content-center align-items-center border-0 p-3 h-100">
                            <span class="event-icon">
                                <img src="{{ asset('assets/img/vcard4/mobile.png') }}" class="img-fluid">
                            </span>
                            <span class="event-name pt-2">+94 83066 14769</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card vcard__event-card d-flex flex-column justify-content-center align-items-center border-0 p-3 h-100">
                            <span class="event-icon">
                                <img src="{{ asset('assets/img/vcard4/location.png') }}" class="img-fluid">
                            </span>
                            <span class="event-name pt-2">Surat - India</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Appointment--}}
        <div class="vcard__appointment py-3">
            <h4 class="vcard__heading heading-line text-center pb-4 position-relative">Make an Appointment</h4>
            <div class="container">
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
        </div>

        {{--our services--}}
        <div class="my-4 px-4 pb-2 position-relative overflow-hidden">
            <div class="line-shape position-absolute">
                <span class="inner-circle position-absolute rounded-circle"></span>
            </div>
            <div class="vcard__service">
                <h4 class="vcard__heading text-center pb-3">OUR SERVICES</h4>
                <div class="container mt-4">
                    <div class="row g-4 justify-content-center">
                        <div class="col-sm-6 service-container">
                            <div class="card service-card h-100 border-0">
                                <div class="service-image rounded-circle d-flex justify-content-center align-items-center mx-auto">
                                    <img src="{{asset('assets/img/vcard4/web-design.png')}}"/>
                                </div>
                                <div class="service-details d-flex flex-column">
                                    <h4 class="mt-3 text-center">Web Design</h4>
                                    <p class="mb-0 text-center">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 service-container">
                            <div class="card service-card h-100 border-0">
                                <div class="service-image rounded-circle d-flex justify-content-center align-items-center mx-auto">
                                    <img src="{{asset('assets/img/vcard4/photography.png')}}"/>
                                </div>
                                <div class="service-details d-flex flex-column">
                                    <h4 class="mt-3 text-center">Photography</h4>
                                    <p class="mb-0 text-center">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--gallery--}}
        <div class="pt-4 px-4">
            <div class="vcard__gallery">
                <h4 class="vcard__heading text-center pb-2">Gallery</h4>
                <div class="container mt-4 py-3">
                    <div class="row g-4 justify-content-center gallery-slider">
                        <div class="col-6">
                            <div class="card gallery-card h-100 border-0 w-100">
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
                            <div class="card gallery-card h-100 border-0 w-100">
                                <div class="gallery-profile">
                                    <img src="{{asset('assets/img/vcard1/v2.jpg')}}" alt="profile" class="w-100"/>
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

        {{--Product--}}
        <div class="pt-4 px-4">
            <div class="vcard__product">
                <h4 class="vcard__heading text-center pb-2">PRODUCTS</h4>
                <div class="container mt-4 py-3">
                    <div class="row g-4 justify-content-center product-slider">
                        <div class="col-6">
                            <div class="card product-card h-100 border-0 w-100">
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
                            <div class="card product-card h-100 border-0 w-100">
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
                    </div>
                </div>
            </div>
        </div>

        {{--Testimonial--}}
        <div class="pt-4 px-4">
            <div class="vcard__testimonial">
                <h4 class="vcard__heading text-center pb-2">TESTIMONIAL</h4>
                <div class="container mt-4 py-3">
                    <div class="row g-4 justify-content-center testimonial-slider">
                        <div class="col-6">
                            <div class="card testimonial-card h-100 border-0 w-100">
                                <img src="{{asset('assets/img/vcard4/testimonial-profile.png')}}"
                                     class="testimonial-image d-block mx-auto"/>
                                <div class="testimonial-details d-flex flex-column">
                                    <p class="mb-0 text-center pt-3">
                                        “Designing systems useful for the user is the most interesting element
                                        in the entire field of design, whic each project.”
                                    </p>
                                </div>
                                <div class="testimonial-user d-flex justify-content-center flex-column align-center mt-3">
                                    <h5 class="user-name text-center position-relative mt-2">Mabelle Becker</h5>
                                    <span class="user-designation text-center">CEO at Go Fashion</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card testimonial-card h-100 border-0 w-100">
                                <img src="{{asset('assets/img/vcard4/testimonial-profile.png')}}" class="testimonial-image d-block mx-auto"/>
                                <div class="testimonial-details d-flex flex-column">
                                    <p class="mb-0 text-center pt-3">
                                        “Designing systems useful for the user is the most interesting element
                                        in the entire field of design, whic each project.”
                                    </p>
                                </div>
                                <div class="testimonial-user d-flex justify-content-center flex-column align-center mt-3">
                                    <h5 class="user-name text-center position-relative mt-2">Mabelle Becker</h5>
                                    <span class="user-designation text-center">CEO at Go Fashion</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- blog--}}
        <div class="vcard__blog py-3">
            <h4 class="vcard__heading heading-line position-relative text-center pb-4">Blog</h4>
            <div class="container">
                <div class="row g-4 blog-slider overflow-hidden">
                    <div class="col-6 mb-2">
                        <div class="card blog-card border-0 w-100 h-100 flex-sm-row">
                            <div class="blog-image">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="blog-details ms-sm-5 ms-0 mt-sm-0 mt-5 p-sm-3">
                                <h5 class="text-sm-start text-center">men's Wear</h5>
                                <p class="mt-2 mb-0 text-sm-start text-center">
                                    Men Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal Suit
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="card blog-card border-0 w-100 h-100 flex-sm-row">
                            <div class="blog-image">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="blog-details ms-sm-5 ms-0 mt-sm-0 mt-5 p-sm-3">
                                <h5 class="text-sm-start text-center">men's Wear</h5>
                                <p class="mt-2 mb-0 text-sm-start text-center">
                                    Men Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal SuitMen Regular Formal Suit
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="card blog-card border-0 w-100 h-100 flex-sm-row">
                            <div class="blog-image">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="blog-details ms-sm-5 ms-0 mt-sm-0 mt-5 p-sm-3">
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
        {{--QR code--}}
        <div class="vcard__qr-code">
            <div class="px-4 pt-5 pb-4">
                <h4 class="vcard__heading text-center pb-5">QR CODE</h4>
                <div class="qr-code d-block mx-auto position-relative px-5 pt-3 pb-3">
                    <div class="qr-code-image d-flex justify-content-center">
                        <img src="{{asset('assets/img/vcard4/qr-code.png')}}"/>
                    </div>
                </div>
                <button type="button" class="qr-code-btn text-white mt-4 d-block mx-auto">Download My QR Code</button>
            </div>
        </div>

        {{--Business hour--}}
        <div class="vcard__timing pt-5 pb-4">
            <div class="px-4">
                <h4 class="vcard__heading text-center pb-4">BUSINESS HOURS</h4>
                <div class="row">
                    <div class="col-sm-6 col-12 week-time mb-2">
                        <span>Sunday :</span>
                        <span>08:10 - 20:00</span>
                    </div>
                    <div class="col-sm-6 col-12 week-time mb-2">
                        <span>Monday :</span>
                        <span>08:10 - 20:00</span>
                    </div>
                    <div class="col-sm-6 col-12 week-time mb-2">
                        <span>Tuesday :</span>
                        <span>08:10 - 20:00</span>
                    </div>
                    <div class="col-sm-6 col-12 week-time mb-2">
                        <span>Wednesday :</span>
                        <span>08:10 - 20:00</span>
                    </div>
                    <div class="col-sm-6 col-12 week-time mb-2">
                        <span>Thursday :</span>
                        <span>08:10 - 20:00</span>
                    </div>
                    <div class="col-sm-6 col-12 week-time mb-2">
                        <span>Friday :</span>
                        <span>08:10 - 20:00</span>
                    </div>
                    <div class="col-sm-6 col-12 week-time">
                        <span>Saturday :</span>
                        <span>close</span>
                    </div>
                </div>
            </div>
        </div>
        {{--contact us--}}
        <div class="vcard__contact-us pb-5 pt-4">
            <div class="px-4">
                <h4 class="vcard__heading text-center pb-4">CONTACT US</h4>
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
                        <textarea class="form-control" placeholder="Send Message" id="message" rows="5"></textarea>
                    </div>
                    <button type="button" class="contact-btn text-white mt-4 d-block mx-auto">Send Message</button>
                </div>
            </div>
            <div class="d-sm-flex justify-content-center mt-5">
                <button type="submit" class="vcard-four-btn text-white mt-4 d-block">
                    <i class="fas fa-download me-2"></i> Download Vcard
                </button>
                {{--share btn--}}
                <button type="button" class="share-btn text-white d-block btn mt-4 ms-sm-4">
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
        speed: 300,
        arrows: false,
        slidesToShow: 2,
        slidesToScroll: 1,
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
