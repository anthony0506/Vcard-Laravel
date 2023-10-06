@extends('vcardTemplates.vcard11.app')
@section('title')
    Resume
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/resume.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('page_name')
    Resume
@endsection
@section('content')
    <div class="tab-content p-sm-4 p-3" id="v-pills-tabContent">
        <div class="resume-tab tab-pane fade show active" id="v-pills-profile" role="tabpanel"
             aria-labelledby="v-pills-profile-tab">
            <!-- start professional-summary-section -->
            <div class="professional-summary-section">
                <div class="section-heading mb-40">
                    <h2 class="fs-22 text-white ps-4 mb-0 ">
                        PROFESSIONAL SUMMARY
                    </h2>
                </div>
                <div class="row mb-md-5 mb-4">
                    <div class="col-md-8 mb-md-0 mb-4">
                        <div class="card position-relative p-4 h-100">
                            <i class="fa-sharp fa-solid fa-qrcode position-absolute"></i>
                            <p class="fs-12 mb-0 text-white">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Dolore magna
                                aliqua.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3 h-100">
                            <h2 class="fs-6 text-white mb-4">Language Knowledge</h2>
                            <ul class="ps-3 mb-0">
                                <li class="fs-12 text-white ps-2 mb-1">DUTCH</li>
                                <li class="fs-12 text-white ps-2 mb-1">FRENCH</li>
                                <li class="fs-12 text-white ps-2 mb-1">PORTUGUESE</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end professional-summary-section -->

            <!-- start work-history-section -->
            <div class="work-history-section mb-md-5 mb-4">
                <div class="section-heading mb-40">
                    <h2 class="fs-22 text-white ps-4 mb-0 "> WORK HISTORY</h2>
                </div>
                <div class="work-history-card ">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card p-4 d-block h-100 ">
                                <h5 class="card-title fs-6 text-white">
                                    SoftService Company
                                </h5>
                                <span class="fs-12">WEB DEVELOPER</span>
                                <p class="fs-12 text-white">
                                    Dolore magna aliqua. Consectetur adipisicing elit. Iusto, optio, dolorum provident
                                    rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde.
                                </p>
                                <a href="#!" class="btn card-btn ">2022 and to the present
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card p-4 d-block h-100 ">
                                <h5 class="card-title fs-6 text-white">
                                    KharkivIT Soft
                                </h5>
                                <span class="fs-12">FRONT-END DEVELOPER</span>
                                <p class="fs-12 text-white">
                                    Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium
                                    ipsa ad debitis unde.
                                </p>
                                <a href="#!" class="btn card-btn ">2016 - 2021</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card p-4 d-block h-100">
                                <h5 class="card-title fs-6 text-white">
                                    Envato Market
                                </h5>
                                <span class="fs-12">SENIOR DEVELOPER</span>
                                <p class="fs-12 text-white">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    ncididunt ut labore et dolore magna aliqua. Ut veniam.
                                </p>
                                <a href="#!" class="btn card-btn ">2015 - 2016</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end work-history-section -->
            <!-- start education-section -->
            <div class="education-section mb-md-5 mb-4">
                <div class="section-heading mb-40">
                    <h2 class="fs-22 text-white ps-4 mb-0 "> EDUCATION</h2>
                </div>
                <div class="work-history-card ">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card p-4 d-block h-100 ">
                                <h5 class="card-title fs-6 text-white">
                                    Programming Course
                                </h5>
                                <span class="fs-12">NEW YORK</span>
                                <p class="fs-12 text-white">
                                    Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium
                                    ipsa ad debitis unde.
                                </p>
                                <a href="#!" class="btn card-btn ">2021 - 2022</a>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card p-4 d-block h-100 ">
                                <h5 class="card-title fs-6 text-white">
                                    University of Design
                                </h5>
                                <span class="fs-12">LONDON</span>
                                <p class="fs-12 text-white">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    ncididunt ut labore et dolore magna aliqua. Ut veniam.
                                </p>
                                <a href="#!" class="btn card-btn ">2012 - 2016</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-4 d-block h-100">
                                <h5 class="card-title fs-6 text-white">
                                    Academy of Art University
                                </h5>
                                <span class="fs-12">PARIS</span>
                                <p class="fs-12 text-white">Dolore magna aliqua. Consectetur adipisicing elit. Iusto,
                                    optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad
                                    debitis unde.</p>
                                <a href="#!" class="btn card-btn ">2008 - 2012</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end education-section -->

            <!-- start skill section -->
            <div class="skill-section">
                <div class="row">
                    <div class="col-md-6">
                        <div class="design-skill-section">
                            <div class="section-heading mb-40">
                                <h2 class="fs-22 text-white ps-4 mb-0 ">DESIGN SKILLS</h2>
                            </div>
                            <div class="progress">
                                <div class="d-flex justify-content-between">
                                    <span class="fs-12 text-white">Photoshop</span>
                                    <span class="fs-12 text-white"> 95% </span>
                                </div>
                                <div data-progress="95"></div>
                                <div class="d-flex justify-content-between">
                                    <span class="fs-12 text-white">Figma</span>
                                    <span class="fs-12 text-white"> 65% </span>
                                </div>
                                <div data-progress="65"></div>
                                <div class="d-flex justify-content-between">
                                    <span class="fs-12 text-white">Sketch</span>
                                    <span class="fs-12 text-white"> 75% </span>
                                </div>
                                <div data-progress="75"></div>
                                <div class="d-flex justify-content-between">
                                    <span class="fs-12 text-white">LightRoom</span>
                                    <span class="fs-12 text-white"> 65% </span>
                                </div>
                                <div data-progress="65"></div>
                                <div class="d-flex justify-content-between">
                                        <span class="fs-12 text-white">Adobe XD
                                        </span>
                                    <span class="fs-12 text-white"> 75% </span>
                                </div>
                                <div data-progress="75"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="devloper-skill-section ">
                            <div class="section-heading mb-40">
                                <h2 class="fs-22 text-white ps-4 mb-0 ">DEVELOPER SKILLS</h2>
                            </div>
                            <div class="row ps-4">
                                <div class="col-6 jquery card mb-4">
                                    <div class="circle">
                                        <div class="bar"></div>
                                        <div class="box"><span></span></div>
                                        <div class="text fs-12 ps-3 pt-lg-2">Jqeury</div>
                                    </div>
                                </div>
                                <div class="card phyton col-6 mb-4">
                                    <div class="circle">
                                        <div class="bar"></div>
                                        <div class="box"><span></span></div>
                                    </div>
                                    <div class="text fs-12 ps-3 pt-lg-2">Phython</div>
                                </div>
                                <div class="card react col-6">
                                    <div class="circle">
                                        <div class="bar"></div>
                                        <div class="box"><span></span></div>
                                    </div>
                                    <div class="text fs-12 ps-3 pt-lg-2">React Js</div>
                                </div>

                                <div class="card php col-6">
                                    <div class="circle">
                                        <div class="bar"></div>
                                        <div class="box"><span></span>
                                        </div>
                                    </div>
                                    <div class="text fs-12 ps-3 pt-lg-2">PHP / MYSQL</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end skill section -->
        </div>
    </div>
@endsection
