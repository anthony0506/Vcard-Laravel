@extends('vcards.vcard11.app')
@section('title')
    Pages
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/portfolio-single.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('page_name')
    Pages
@endsection
@section('content')
    <div class="tab-content p-sm-4 p-3" id="v-pills-tabContent">
        <div class="portfolio-single-tab tab-pane fade show active" id="nav-portfolio-single" role="tabpanel"
             aria-labelledby="nav-portfolio-single-tab">
            <!-- start testimonials-section -->
            <section class="testimonials-section position-relative">
                <div class="section-heading mb-40">
                    <h2 class="fs-22 text-white ps-4">PORTFOLIO PROJECT TITLE</h2>
                </div>
                <div class="slick-slider1">
                    <div class=" element element-1 ">
                        <img src="{{ asset('assets/img/vcard11/portfolio-1.jpeg') }}"
                             class="w-100 h-100 object-fit-cover">
                        <div class="search" onclick="openModal();currentSlide(1)">
                            <a href="#!" class="search d-flex justify-content-center align-items-center ">
                                <i class="fas fa-magnifying-glass d-flex justify-content-center align-items-center text-white fs-6"></i>
                            </a>
                        </div>
                    </div>
                    <div class="element element-2 ">
                        <img src="{{ asset('assets/img/vcard11/portfolio-2.jpeg') }}"
                             class="w-100 h-100 object-fit-cover">
                        <div class="search" onclick="openModal();currentSlide(2)">
                            <a href="#!" class="search d-flex justify-content-center align-items-center ">
                                <i class="fas fa-magnifying-glass d-flex justify-content-center align-items-center text-white fs-6"></i>
                            </a>
                        </div>
                    </div>
                    <div class="element element-3">
                        <img src="{{ asset('assets/img/vcard11/portfolio-3.jpeg') }}"
                             class="w-100 h-100 object-fit-cover">
                        <div class="search" onclick="openModal();currentSlide(3)">
                            <a href="#!" class="search d-flex justify-content-center align-items-center ">
                                <i class="fas fa-magnifying-glass d-flex justify-content-center align-items-center text-white fs-6"></i>
                            </a>
                        </div>
                    </div>
                    <div class="element element-4">
                        <img src="{{ asset('assets/img/vcard11/portfolio-4.jpeg') }}"
                             class="w-100 h-100 object-fit-cover">
                        <div class="search" onclick="openModal();currentSlide(4)">
                            <a href="#!" class="search d-flex justify-content-center align-items-center ">
                                <i class="fas fa-magnifying-glass d-flex justify-content-center align-items-center text-white fs-6"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="myModal" class="modal">
                    <span class="close cursor" onclick="closeModal()">&times;</span>
                    <div class="modal-content">
                        <div class="mySlides">
                            <img src="{{ asset('assets/img/vcard11/portfolio-1.jpeg') }}" class="w-100">
                        </div>
                        <div class="mySlides">
                            <img src="{{ asset('assets/img/vcard11/portfolio-2.jpeg') }}" class="w-100">
                        </div>
                        <div class="mySlides">
                            <img src="{{ asset('assets/img/vcard11/portfolio-3.jpeg') }}" class="w-100">
                        </div>
                        <div class="mySlides">
                            <img src="{{ asset('assets/img/vcard11/portfolio-4.jpeg') }}" class="w-100">
                        </div>
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                </div>
            </section>
            <!-- end testimonials-section -->
            <!-- start professional-summary-section -->
            <div class="professional-summary-section mb-4">
                <div class="row ">
                    <div class="col-xl-8 col-md-7 mb-md-0 mb-4">
                        <div class="card h-100 p-4">
                            <h2 class="fs-6 text-white mb-4">Project Info</h2>
                            <p class="fs-12 mb-0 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-5">
                        <div class="card h-100 p-4">
                            <h2 class="fs-6 text-white mb-3">Project Details</h2>
                            <ul class="ps-2 mb-0">
                                <li class="fs-12 text-white ps-2 mb-2">CATEGORY : BRANDING</li>
                                <li class="fs-12 text-white ps-2 mb-2">DATE : 02.03.2022</li>
                                <li class="fs-12 text-white ps-2 mb-2">CLIENT : USLA INK</li>
                                <li class="fs-12 text-white ps-2 ">ADDRESS : DOMIAN.COM</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end professional-summary-section -->

            <!-- start project-title-btn section -->
            <div class="project-title-btn-section">
                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="prev-btn d-flex border-right position-relative">
                            <a href="../pages/{{ route('vcard11.portfolio-single') }}" class="fs-12 w-100 p-4"><i
                                        class="fas fa-caret-left me-2"></i><span
                                        class="text-white">Prev - Project Title</span></a>
                            <div class="prev-btn-content">
                                <img src="{{ asset('assets/img/vcard11/portfolio-1.jpeg') }}"
                                     class="w-100 h-100 object-fit-cover">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 text-end">
                        <div class="next-btn d-flex position-relative">
                            <a href="../pages/{{ route('vcard11.portfolio-single-2') }}" class="fs-12 w-100 p-4"><span
                                        class="text-white">Next - Project Title</span><i
                                        class="fas fa-caret-right ms-2"></i></a>
                            <div class="next-btn-content">
                                <img src="{{ asset('assets/img/vcard11/portfolio-2.jpeg') }}"
                                     class="w-100 h-100 object-fit-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end project-title-btn section -->
        </div>

        <script src="{{ asset('assets/js/vcard11/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>
        <script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>

        <script>
            $('.counter').each(function () {
                var $this = $(this),
                    countTo = $this.attr('data-countto')
                countDuration = parseInt($this.attr('data-duration'))
                $({ counter: $this.text() }).animate(
                    {
                        counter: countTo,
                    },
                    {
                        duration: countDuration,
                        easing: 'linear',
                        step: function () {
                            $this.text(Math.floor(this.counter))
                        },
                        complete: function () {
                            $this.text(this.counter)
                        },
                    },
                )
            })
        </script>

        <script>
            $('.slick-slider1').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                dots: true,
                arrows: true,
                prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-chevron-left"></i></button>',
                nextArrow: '<button class="slide-arrow next-arrow"><i class="fa-solid fa-chevron-right"></i></button>',
                responsive: [
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        },
                    },
                ],
            })

        </script>
        <script>
            function openbars () {
                document.getElementById('v-pills-tab').style.display = 'none'
                document.getElementById('pages-menu').style.display = 'block'
            }

            function closebars () {
                document.getElementById('v-pills-tab').style.display = 'block'
                document.getElementById('pages-menu').style.display = 'none'
            }

            function openbars1 () {
                document.getElementById('v-pills-tab1').style.display = 'none'
                document.getElementById('pages-menu1').style.display = 'block'
            }

            function closebars1 () {
                document.getElementById('v-pills-tab1').style.display = 'block'
                document.getElementById('pages-menu1').style.display = 'none'
            }
        </script>

        <script>
            function openModal () {
                document.getElementById('myModal').style.display = 'block'
            }

            function closeModal () {
                document.getElementById('myModal').style.display = 'none'
            }

            var slideIndex = 1
            showSlides(slideIndex)

            function plusSlides (n) {
                showSlides(slideIndex += n)
            }

            function currentSlide (n) {
                showSlides(slideIndex = n)
            }

            function showSlides (n) {
                var i
                var slides = document.getElementsByClassName('mySlides')
                var dots = document.getElementsByClassName('demo')

                if (n > slides.length) {slideIndex = 1}
                if (n < 1) {slideIndex = slides.length}
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = 'none'
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(' active', '')
                }
                slides[slideIndex - 1].style.display = 'block'
                dots[slideIndex - 1].className += ' active'
                captionText.innerHTML = dots[slideIndex - 1].alt
            }
        </script>
        <script>
            $(document).ready(function () {
                $('.dropbtn').click(function () {
                    $('.dropdown-content').toggleClass('show')
                })
                $(document).click(function (event) {
                    if (!$(event.target).is('.dropbtn')) {
                        $('.dropdown-content').removeClass('show')
                    }
                })
            })
        </script>

        <script>
            $(document).ready(function () {
                $('.sharedropbtn').click(function () {
                    $('.sharedropdown-content').toggleClass('activetab')
                })
                $(document).click(function (event) {
                    if (!$(event.target).is('.sharedropbtn')) {
                        $('.sharedropdown-content').removeClass('activetab')
                    }
                })
            })
        </script>
@endsection
