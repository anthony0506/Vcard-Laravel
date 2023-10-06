<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
   <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">

    <title>Vcard2 Theme</title>

    {{--css link--}}
    <link rel="stylesheet" href="{{ asset('assets/css/vcard2.css')}}">

    {{--slick slider--}}
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">


    {{--google Font--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>
<body>
<div class="container">
    <div class="vcard-two main-content w-100 mx-auto overflow-hidden">
        {{--banner--}}
        <div class="vcard-two__banner w-100 position-relative">
            <img src="{{asset('assets/img/vcard2/vcard2-banner.png')}}" class="img-fluid banner-image position-relative"
                 alt="background"/>
            {{--shape img--}}
            <img src="{{asset('assets/img/vcard2/shape1.png')}}" class="banner-shape position-absolute end-0"
                 alt="shape"/>

            <div class="d-flex justify-content-end position-absolute top-0 end-0 me-3 custom-language">
                <div class="language pt-4 me-2">
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
        <div class="vcard-two__profile position-relative">
            <div class="avatar position-absolute top-0 translate-middle">
                <img src="{{asset('assets/img/vcard2/vcard2-profile.png')}}" alt="profile-img" class="rounded-circle"/>
            </div>
        </div>
        {{--profile details--}}
        <div class="vcard-two__profile-details py-3 px-3">
            <h4 class="vcard-two-heading">Tricky Stewart</h4>
            <span class="profile-designation">A Full Stack Developer</span>
            <br>
            <span class="profile-description d-flex pt-4"> I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery,I am a heart surgeon. I have 10 year experience in surgery</span>
            <div class="social-icons d-flex pt-4">
                <i class="fab fa-facebook facebook-icon icon me-sm-3 me-2 fa-2x"></i>
                <i class="fab fa-instagram instagram-icon icon mx-sm-3 mx-3 fa-2x"></i>
                <i class="fab fa-linkedin-in linkedin-icon icon mx-sm-3 mx-3 fa-2x"></i>
                <i class="fab fa-whatsapp whatsapp-icon icon mx-sm-3 mx-3 fa-2x"></i>
                <i class="fab fa-twitter twitter-icon icon ms-sm-3 ms-2 fa-2x"></i>
            </div>
        </div>
        {{--event--}}
        <div class="vcard-two__event py-3 px-3">
            <div class="event-details d-flex">
                <div class="event-image">
                    <img src="{{asset('assets/img/vcard2/vcard2-email.png')}}" alt="email" class=""/>
                </div>
                <span>trickywart376@gmail.com</span>
            </div>
            <div class="event-details d-flex">
                <div class="event-image">
                    <img src="{{asset('assets/img/vcard2/vcard2-birthday.png')}}" alt="birthday" class=""/>
                </div>
                <span>30 - october 1997</span>
            </div>
            <div class="event-details d-flex">
                <div class="event-image">
                    <img src="{{asset('assets/img/vcard2/vcard2-phone.png')}}" alt="phone" class=""/>
                </div>
                <span>+94 83066 14769</span>
            </div>
            <div class="event-details d-flex">
                <div class="event-image">
                    <img src="{{asset('assets/img/vcard2/vcard2-location.png')}}" alt="Address" class=""/>
                </div>
                <span>Surat - India</span>
            </div>
        </div>
        {{--Appointment--}}
        <div class="vcard-two__appointment py-3">
            <h4 class="vcard-two-heading text-center pb-4">Make an Appointment</h4>
            <div class="container">
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
        <div class="vcard-two__service my-3 py-3 position-relative">
            {{--shape img--}}
            <img src="{{asset('assets/img/vcard2/shape2.png')}}" class="banner-shape-two position-absolute end-0" alt="shape"/>
            <img src="{{asset('assets/img/vcard2/shape3.png')}}" class="banner-shape-three position-absolute start-0" alt="shape"/>
            <h4 class="vcard-two-heading text-center pb-4">Our Services</h4>
            <div class="container">
                <div class="row g-3">
                    <div class="col-sm-6 col-12">
                        <div class="card service-card d-flex align-items-center p-2 h-100 border-0">
                            <div class="service-image d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/vcard2/service1.png')}}" alt="Ui/Ux"/>
                            </div>
                            <div class="service-details mt-3">
                                <h4 class="service-title text-center">UI/UX</h4>
                                <p class="service-paragraph mb-0 text-center">
                                    Landing Page User Flow, Wireframing Prototyping mobile app design
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card service-card d-flex align-items-center p-2 h-100 border-0">
                            <div class="service-image d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/vcard2/service2.png')}}" alt="Icons"/>
                            </div>
                            <div class="service-details mt-3">
                                <h4 class="service-title text-center">Icons</h4>
                                <p class="service-paragraph mb-0 text-center">
                                    Landing Page User Flow, Wireframing
                                    Prototyping mobile app design
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card service-card d-flex align-items-center p-2 h-100 border-0">
                            <div class="service-image d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/vcard2/service1.png')}}" alt="Ui/Ux"/>
                            </div>
                            <div class="service-details mt-3">
                                <h4 class="service-title text-center">UI/UX</h4>
                                <p class="service-paragraph mb-0 text-center">
                                    Landing Page User Flow, Wireframing Prototyping mobile app design
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card service-card d-flex align-items-center p-2 h-100 border-0">
                            <div class="service-image d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/vcard2/service2.png')}}" alt="Icons"/>
                            </div>
                            <div class="service-details mt-3">
                                <h4 class="service-title text-center">Icons</h4>
                                <p class="service-paragraph mb-0 text-center">
                                    Landing Page User Flow, Wireframing
                                    Prototyping mobile app design
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--gallary--}}

        <div class="vcard-two__gallery mt-3 py-3 position-relative px-3">
            <h4 class="vcard-two-heading text-center pb-4">Gallery</h4>
            <div class="container">
                <div class="row g-3 gallery-slider">
                    <div class="col-6 p-2">
                        <div class="card gallery-card p-3 border-0 w-100 h-100">
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
                    <div class="col-6 p-2">
                        <div class="card gallery-card p-3 border-0 w-100 h-100">
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
        <div class="vcard-two__product mt-3 py-3 position-relative px-3">
            <h4 class="vcard-two-heading text-center pb-4">Products</h4>
            <div class="container">
                <div class="row g-3 product-slider">
                    <div class="col-6 p-2">
                        <div class="card product-card p-3 border-0 w-100 h-100">
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
                    <div class="col-6 p-2">
                        <div class="card product-card p-3 border-0 w-100 h-100">
                            <div class="product-profile">
                                <img src="{{asset('assets/img/vcard1/v2.jpg')}}" alt="profile" class="w-100"/>
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
        <div class="vcard-two__testimonial mt-3 py-3 position-relative px-3">
            <h4 class="vcard-two-heading text-center pb-4">Testimonial</h4>
            <div class="container">
                <div class="row g-3 testimonial-slider">
                    <div class="col-12 p-2">
                        <div
                            class="card testimonial-card flex-sm-row flex-column-reverse p-3 border-0 align-items-center w-100">
                            <div class="me-sm-3">
                                <p class="review-message mb-2 text-sm-start text-center">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Proin dignissim porttitor sollicitudin. Duis tellus ante,
                                    aliquet a nisl ac, pharetra suscipit quam. In eu volutpat
                                    eros, et bibendum turpis.
                                </p>
                                <div class="user-details d-flex justify-content-sm-start justify-content-center">
                                    <span class="user-name">Shane Watson</span>
                                    <span class="user-designation">- CEO at Tarsons</span>
                                </div>
                            </div>
                            <div class="testimonial-profile mb-sm-0 mb-3 ms-sm-auto">
                                <img src="{{asset('assets/img/vcard2/vcard-testimonial.png')}}" alt="profile" class="rounded-circle"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- blog--}}
        <div class="vcard-two__blog py-3">
            <h4 class="vcard-two-heading text-center pb-4">Blog</h4>
            <div class="container">
                <div class="row g-4 blog-slider overflow-hidden">
                    <div class="col-6 mb-2">
                        <div class="card blog-card p-4 border-0 w-100 h-100">
                            <div class="blog-image">
                                <img src="{{asset('assets/img/vcard1/v1.jpg')}}" alt="profile" class="w-100"/>
                            </div>
                            <div class="blog-details mt-5">
                                <h4 class="text-center">men's Wear</h4>
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
        <div class="vcard-two__qr-code py-3 position-relative px-3">
            {{--shape img--}}
            <img src="{{asset('assets/img/vcard2/shape2.png')}}" class="banner-shape-four position-absolute end-0 d-sm-block d-none" alt="shape"/>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card qr-code-card p-3 border-0">
                            <h4 class="vcard-two-heading text-center pb-4">QR Code</h4>
                            <div class="row">
                                <div class="col-sm-6 col-12 mb-sm-0 mb-4">
                                    <button type="button" class="qr-code-btn text-white mt-5 d-sm-block d-none mx-auto">Download My QR Code</button>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="qr-code-image d-flex justify-content-center">
                                        <img src="{{asset('assets/img/vcard2/vcard2-qr-code.png')}}" alt="qr-profile"/>
                                    </div>
                                    <button type="button" class="qr-code-btn text-white mt-4 d-sm-none d-block mx-auto">
                                        Download My QR Code
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--business hour--}}
        <div class="vcard-two__business-hour py-4 position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 d-sm-block d-none ps-0">
                        <div class="shape-image">
                            <img src="{{asset('assets/img/vcard2/shape5.png')}}" class="img-fluid" alt="business time"/>
                        </div>
                    </div>
                    <div class="col-sm-7 col-12 pe-md-4">
                        <h4 class="vcard-two-heading text-center pb-4">Business Hours</h4>
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
        <div class="vcard-two__contact py-4 position-relative">
            <img src="{{asset('assets/img/vcard2/shape6.png')}}" class="position-absolute start-0 bottom-0 d-sm-block d-none" alt="shape"/>
            <h4 class="vcard-two-heading text-center pb-4">Contact Us</h4>
            <div class="container">
                <div class="row">
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
                            <button type="button" class="contact-btn text-white mt-4 d-block ms-auto">Send Message
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-sm-flex justify-content-center mt-5">
                <button type="submit" class="vcard-two-btn text-white mt-4 d-block">
                    <i class="fas fa-download me-2"></i> Download Vcard
                </button>
                {{--share btn--}}
                <button type="button" class="share-btn text-white d-block btn mt-4 ms-sm-3">
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
        autoplay: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
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
