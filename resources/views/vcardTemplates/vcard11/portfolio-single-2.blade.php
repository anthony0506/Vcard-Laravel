@extends('vcardTemplates.vcard11.app')
@section('title')
    Pages
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/portfolio-single-2.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('page_name')
    Pages
@endsection
@section('content')
    <div class="tab-content p-sm-4 p-3" id="v-pills-tabContent">
        <div class="portfolio-single-2-tab tab-pane fade show active" id="nav-portfolio-single-2" role="tabpanel"
             aria-labelledby="nav-portfolio-single-2-tab">
            <!--start portfolio-project-section -->
            <div class="portfolio-project-section">
                <div class="section-heading mb-40">
                    <h2 class="fs-22 text-white ps-4">PORTFOLIO PROJECT TITLE</h2>
                </div>
                <div class="portfolio-project">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="portfolio-img">
                                <img src="{{ asset('assets/img/vcard11/portfolio-2.jpeg') }}"
                                     class="w-100 h-100 object-fit-cover">
                                <div class="search" onclick="openModal();currentSlide(1)">
                                    <a href="#!" class="search d-flex justify-content-center align-items-center ">
                                        <i class="fas fa-magnifying-glass d-flex justify-content-center align-items-center text-white fs-6"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="portfolio-img">
                                <img src="{{ asset('assets/img/vcard11/portfolio-3.jpeg') }}"
                                     class="w-100 h-100 object-fit-cover">
                                <div class="search" onclick="openModal();currentSlide(2)">
                                    <a href="#!" class="search d-flex justify-content-center align-items-center ">
                                        <i class="fas fa-magnifying-glass d-flex justify-content-center align-items-center text-white fs-6"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="portfolio-img">
                                <img src="{{ asset('assets/img/vcard11/portfolio-4.jpeg') }}"
                                     class="w-100 h-100 object-fit-cover">
                                <div class="search" onclick="openModal();currentSlide(3)">
                                    <a href="#!" class="search d-flex justify-content-center align-items-center ">
                                        <i class="fas fa-magnifying-glass d-flex justify-content-center align-items-center text-white fs-6"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="portfolio-img">
                                <img src="{{ asset('assets/img/vcard11/portfolio-5.jpeg') }}"
                                     class="w-100 h-100 object-fit-cover">
                                <div class="search" onclick="openModal();currentSlide(4)">
                                    <a href="#!" class="search d-flex justify-content-center align-items-center ">
                                        <i class="fas fa-magnifying-glass d-flex justify-content-center align-items-center text-white fs-6"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="portfolio-img">
                                <img src="{{ asset('assets/img/vcard11/portfolio-6.jpeg') }}"
                                     class="w-100 h-100 object-fit-cover">
                                <div class="search" onclick="openModal();currentSlide(5)">
                                    <a href="#!" class="search d-flex justify-content-center align-items-center ">
                                        <i class="fas fa-magnifying-glass d-flex justify-content-center align-items-center text-white fs-6"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="portfolio-img" onclick="openModal();currentSlide(6)">
                                <img src="{{ asset('assets/img/vcard11/blog-post4.jpeg') }}"
                                     class="w-100 h-100 object-fit-cover">
                                <div class="search">
                                    <a href="#!" class="search d-flex justify-content-center align-items-center ">
                                        <i class="fas fa-magnifying-glass d-flex justify-content-center align-items-center text-white fs-6"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="myModal" class="modal">
                    <span class="close cursor" onclick="closeModal()">&times;</span>
                    <div class="modal-content">
                        <div class="mySlides">
                            <img src="{{ asset('assets/img/vcard11/portfolio-2.jpeg') }}" style="width:100%">
                        </div>
                        <div class="mySlides">
                            <img src="{{ asset('assets/img/vcard11/portfolio-3.jpeg') }}" style="width:100%">
                        </div>
                        <div class="mySlides">
                            <img src="{{ asset('assets/img/vcard11/portfolio-4.jpeg') }}" style="width:100%">
                        </div>
                        <div class="mySlides">
                            <img src="{{ asset('assets/img/vcard11/portfolio-5.jpeg') }}" style="width:100%">
                        </div>
                        <div class="mySlides">
                            <img src="{{ asset('assets/img/vcard11/portfolio-6.jpeg') }}" style="width:100%">
                        </div>
                        <div class="mySlides">
                            <img src="{{ asset('assets/img/vcard11/blog-post4.jpeg') }}" style="width:100%">
                        </div>
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                </div>
            </div>
            <!--end portfolio-project-section -->
            <!-- start professional-summary-section -->
            <div class="professional-summary-section mb-4">
                <div class="row ">
                    <div class="col-xl-8 col-md-7 mb-md-0 mb-4">
                        <div class="card h-100 p-4">
                            <h2 class="fs-6 text-white mb-4">Project Info</h2>
                            <p class="fs-12 mb-0 text-white">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Dolore magna
                                aliqua.
                            </p>
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
    </div>
@endsection

