@extends('vcardTemplates.vcard11.app')
@section('title')
{{ __('messages.vcard.blog_details') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/blog-single.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('page_name')
    {{ __('messages.vcard.blog_details') }}
@endsection
@section('content')
    <div class="tab-content p-sm-4 p-3" id="v-pills-tabContent">
        <div class="blog-single-tab tab-pane fade show active" id="nav-blog-single" role="tabpanel"
             aria-labelledby="nav-blog-single-tab">
            <section class="blog-section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-post mb-4">
                            <div class="section-heading mb-4">
                                <div class="d-flex justify-content-end text-align-end">
                                    <a class="btn btn-primary" role="button"
                                       href="{{ url()->previous() }}">  {{__('messages.common.back')}}</a>
                                </div>
                                <h2 class="fs-22 text-white ps-4">{{ $blogSingle->title }}</h2>
                                <div class="ps-4">
                                    <span class="fs-14 "><i class="fa-regular fa-calendar"></i></span>
                                    <span class="fs-12 text-white"> {{ \Carbon\Carbon::parse($blogSingle->created_at)->isoFormat('Do MMMM YYYY')}}</span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div id="carouselExampleIndicators1" class="carousel slide" data-bs-ride="carousel">
                                    {{--                                    <div class="carousel-indicators ">--}}
                                    {{--                                        <button type="button" data-bs-target="#carouselExampleIndicators1"--}}
                                    {{--                                                data-bs-slide-to="0" class="active" aria-current="true"--}}
                                    {{--                                                aria-label="Slide 1"></button>--}}
                                    {{--                                        <button type="button" data-bs-target="#carouselExampleIndicators1"--}}
                                    {{--                                                data-bs-slide-to="1" aria-label="Slide 2"></button>--}}
                                    {{--                                        <button type="button" data-bs-target="#carouselExampleIndicators1"--}}
                                    {{--                                                data-bs-slide-to="2" aria-label="Slide 3"></button>--}}
                                    {{--                                    </div>--}}
                                    <div class="carousel-inner">
                                        <div class="carousel-item-blog-single active">
                                            <img src="{{ $blogSingle->blog_icon  }}"
                                                 class="w-100 h-100 rounded object-fit-cover">
                                            {{--                                            <div class="search" onclick="openModalBox2();currentSlide(1)">--}}
                                            {{--                                                <a href="#!"--}}
                                            {{--                                                   class="search d-flex justify-content-center align-items-center ">--}}
                                            {{--                                                    <i class="fas fa-magnifying-glass d-flex justify-content-center align-items-center text-white fs-6"></i>--}}
                                            {{--                                                </a>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                        {{--                                        <div class="carousel-item">--}}
                                        {{--                                            <img src="{{ asset('assets/img/vcard11/blog-post2.jpeg') }}"--}}
                                        {{--                                                 class="w-100 h-100 object-fit-cover">--}}
                                        {{--                                            <div class="search" onclick="openModalBox2();currentSlide(2)">--}}
                                        {{--                                                <a href="#!"--}}
                                        {{--                                                   class="search d-flex justify-content-center align-items-center ">--}}
                                        {{--                                                    <i class="fas fa-magnifying-glass d-flex justify-content-center align-items-center text-white fs-6"></i>--}}
                                        {{--                                                </a>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="carousel-item">--}}
                                        {{--                                            <img src="{{ asset('assets/img/vcard11/blog-post3.jpeg') }}"--}}
                                        {{--                                                 class="w-100 h-100 object-fit-cover">--}}
                                        {{--                                            <div class="search" onclick="openModalBox2();currentSlide(3)">--}}
                                        {{--                                                <a href="#!"--}}
                                        {{--                                                   class="search d-flex justify-content-center align-items-center ">--}}
                                        {{--                                                    <i class="fas fa-magnifying-glass d-flex justify-content-center align-items-center text-white fs-6"></i>--}}
                                        {{--                                                </a>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                    {{--                                    <div class="d-none d-md-block">--}}
                                    {{--                                        <button class=" carousel-control-prev" type="button"--}}
                                    {{--                                                data-bs-target="#carouselExampleIndicators1" data-bs-slide="prev">--}}
                                    {{--                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
                                    {{--                                            <span class="visually-hidden">Previous</span>--}}
                                    {{--                                        </button>--}}
                                    {{--                                        <button class=" carousel-control-next" type="button"--}}
                                    {{--                                                data-bs-target="#carouselExampleIndicators1" data-bs-slide="next">--}}
                                    {{--                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
                                    {{--                                            <span class="visually-hidden">Next</span>--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                            {{--                            <div id="myModalbox2" class="modalbox2">--}}
                            {{--                                <span class="close cursor" onclick="closeModalBox2()">&times;</span>--}}
                            {{--                                <div class="modal-content">--}}
                            {{--                                    <div class="mySlidesbox2">--}}
                            {{--                                        <img src="{{ asset('assets/img/vcard11/blog-post1.jpeg') }}" style="width:100%">--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="mySlidesbox2">--}}
                            {{--                                        <img src="{{ asset('assets/img/vcard11/blog-post2.jpeg') }}" style="width:100%">--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="mySlidesbox2">--}}
                            {{--                                        <img src="{{ asset('assets/img/vcard11/blog-post3.jpeg') }}" style="width:100%">--}}
                            {{--                                    </div>--}}
                            {{--                                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>--}}
                            {{--                                    <a class="next" onclick="plusSlides(1)">&#10095;</a>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="blog-post-desc ">
                                {{--                                <div class="desc d-flex flex-wrap align-items-center mb-4 pt-2">--}}
                                {{--                                    <div class="me-4">--}}
                                {{--                                        <span class="fs-14 me-2"><i class="fa-regular fa-eye"></i></span>--}}
                                {{--                                        <span class="fs-12 text-white"> 164 views</span>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="">--}}
                                {{--                                        <span class="fs-14 me-2"><i class="fa-regular fa-message"></i></span>--}}
                                {{--                                        <span class="fs-12 text-white">6 comments</span>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <p class="fs-14 text-white mb-4">
                                    {!! $blogSingle->description !!}
                                </p>
                                {{--                                <div class="tags d-flex flex-wrap ">--}}
                                {{--                                    <div class="me-2 mb-2">--}}
                                {{--                                        <a href="#!" class="fs-12 d-inline-block">Design</a>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="me-2 mb-2">--}}
                                {{--                                        <a href="#" class="fs-12 d-inline-block">Video</a>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="me-2 mb-2">--}}
                                {{--                                        <a href="#" class="fs-12 d-inline-block">Photo</a>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                        <!-- start comment-section -->
                    {{--                        <div class="comment-section p-4 mb-4">--}}
                    {{--                            <h3 class="fs-6 text-white mb-4">Comments</h3>--}}
                    {{--                            <div class="comment d-flex">--}}
                    {{--                                <div class="comment-img d-sm-block d-none">--}}
                    {{--                                    <img src="{{ asset('assets/img/vcard11/comment.jpeg') }}"--}}
                    {{--                                         class="w-100 h-100 object-fit-cover">--}}
                    {{--                                </div>--}}
                    {{--                                <div class="comment-desc p-4 ms-sm-4 position-relative">--}}
                    {{--                                    <div class="tag d-flex justify-content-center align-items-center">--}}
                    {{--                                        <a href="#!" class="fs-14 text-white">01</a>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="comment-img d-sm-none d-block position-relative">--}}
                    {{--                                        <img src="{{ asset('assets/img/vcard11/comment.jpeg') }}"--}}
                    {{--                                             class="w-100 h-100 object-fit-cover">--}}
                    {{--                                    </div>--}}
                    {{--                                    <h5 class="fs-6 text-white mb-sm-4 ps-sm-0 ps-5 ms-sm-0 ms-2">Kevin Antony</h5>--}}
                    {{--                                    <p class="text-white fs-12 mb-0 mt-sm-0 mt-3">--}}
                    {{--                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit.--}}
                    {{--                                        Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id,--}}
                    {{--                                        mattis vel, nisi. .</p>--}}
                    {{--                                    <div class="d-flex justify-content-between align-items-center flex-wrap">--}}
                    {{--                                        <span class="fs-12 me-3 mt-sm-4 mt-3">JANUARY 02, 2022</span>--}}
                    {{--                                        <a class="btn btn-primary fs-12 mt-sm-4 mt-3" href="#"><i--}}
                    {{--                                                    class="fas fa-reply me-2"></i> Reply</a>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    <!-- end comment-section -->

                        <!-- start leave-comment section -->
                    {{--                        <div class="leave-comment-section mb-4">--}}
                    {{--                            <div class="section-heading mb-4">--}}
                    {{--                                <h2 class="fs-22 text-white ps-4 mb-1">Leave A Comment</h2>--}}
                    {{--                            </div>--}}
                    {{--                            <form>--}}
                    {{--                                <div class="form-group mb-4">--}}
                    {{--                                    <div class="input-icon">--}}
                    {{--                                        <i class="fas fa-user-plus"></i>--}}
                    {{--                                        </div>--}}
                    {{--                                    <input type="name" class="form-control fs-12 text-white"--}}
                    {{--                                           id="exampleFormControlInput1" placeholder="Your Name *" required="">--}}
                    {{--                                </div>--}}
                    {{--                                <div class="form-group mb-4">--}}
                    {{--                                    <div class="input-icon">--}}
                    {{--                                        <i class="fas fa-envelope"></i>--}}
                    {{--                                    </div>--}}
                    {{--                                    <input type="email" class="form-control fs-12 text-white"--}}
                    {{--                                           id="exampleFormControlInput1" placeholder="Email Address*" required="">--}}
                    {{--                                </div>--}}
                    {{--                                <div class="form-group mb-4 text-area">--}}
                    {{--                                    <div class="input-icon">--}}
                    {{--                                        <i class="fas fa-message"></i>--}}
                    {{--                                    </div>--}}
                    {{--                                    <textarea name="comments" id="comments"--}}
                    {{--                                              class="text-area form-control pt-2 fs-12 text-white" rows="5"--}}
                    {{--                                              placeholder="Your Message:"></textarea>--}}
                    {{--                                </div>--}}
                    {{--                                <button class="btn btn-primary fs-14">Add Comment</button>--}}
                    {{--                            </form>--}}
                    {{--                        </div>--}}
                    <!-- end leave-comment section -->
                    </div>
                    {{--                    <div class="col-lg-4">--}}
                    {{--                        <div class="blog-right-section">--}}
                    {{--                            <div class="search-section mb-4">--}}
                    {{--                                <div class="search-box ">--}}
                    {{--                                    <form action="#">--}}
                    {{--                                        <input type="text" class="search" placeholder="Search..." value="">--}}
                    {{--                                        <button class="search-icon"><i class="fa fa-search transition"></i>--}}
                    {{--                                        </button>--}}
                    {{--                                    </form>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <!-- start tags-section -->--}}
                    {{--                            <div class="tags-section">--}}
                    {{--                                <div class="section-heading mb-4">--}}
                    {{--                                    <h2 class="fs-22 text-white ps-4">Tags</h2>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="tags d-flex flex-wrap mb-4">--}}
                    {{--                                    <div class="me-2 mb-2">--}}
                    {{--                                        <a href="#!" class="fs-12 d-inline-block">Paint</a>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="me-2 mb-2">--}}
                    {{--                                        <a href="#" class="fs-12 d-inline-block">Construction</a>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="me-2 mb-2">--}}
                    {{--                                        <a href="#" class="fs-12 d-inline-block">Build</a>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="me-2 mb-2">--}}
                    {{--                                        <a href="#" class="fs-12 d-inline-block">Poster</a>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="me-2 mb-2">--}}
                    {{--                                        <a href="#" class="fs-12 d-inline-block">Trends</a>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <!-- end tags-section -->--}}

                    {{--                            <!-- start categories-section -->--}}
                    {{--                            <div class="categories-section mb-4">--}}
                    {{--                                <div class="section-heading mb-4">--}}
                    {{--                                    <h2 class="fs-22 text-white ps-4">Categories</h2>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="category-box p-4">--}}
                    {{--                                    <div class="d-flex align-items-center justify-content-between mb-3">--}}
                    {{--                                        <a href="#" class="fs-14">Standard</a>--}}
                    {{--                                        <span>3</span>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="d-flex align-items-center justify-content-between mb-3">--}}
                    {{--                                        <a href="#" class="fs-14">Video</a>--}}
                    {{--                                        <span>6</span>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="d-flex align-items-center justify-content-between mb-3">--}}
                    {{--                                        <a href="#" class="fs-14">Gallery</a>--}}
                    {{--                                        <span>12</span>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="d-flex align-items-center justify-content-between">--}}
                    {{--                                        <a href="#" class="fs-14">Quotes</a>--}}
                    {{--                                        <span>4</span>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                            <!-- end categories-section -->--}}

                    {{--                            <!-- start last-post-section -->--}}
                    {{--                            <div class="last-post-section mb-4">--}}
                    {{--                                <div class="section-heading mb-4">--}}
                    {{--                                    <h2 class="fs-22 text-white ps-4">Latest Posts</h2>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="last-posts d-flex ">--}}
                    {{--                                    <a href="#!" class="post d-block">--}}
                    {{--                                        <img src="{{ asset('assets/img/vcard11/last-post1.jpeg') }}"--}}
                    {{--                                             class="w-100 h-100 object-fit-cover">--}}
                    {{--                                    </a>--}}
                    {{--                                    <div class="last-post-desc ps-3">--}}
                    {{--                                        <a href="#!" class="fs-14 text-white">Vivamus dapibus rutrum</a>--}}
                    {{--                                        <span class="d-flex align-items-center fs-12 text-white"><i--}}
                    {{--                                                    class="fas fa-calendar me-2"></i> 27 Mar 2021 </span>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="last-posts d-flex ">--}}
                    {{--                                    <a href="#!" class="post d-block">--}}
                    {{--                                        <img src="{{ asset('assets/img/vcard11/last-post2.jpeg') }}"--}}
                    {{--                                             class="w-100 h-100 object-fit-cover">--}}
                    {{--                                    </a>--}}
                    {{--                                    <div class="last-post-desc ps-3">--}}
                    {{--                                        <a href="#!" class="fs-14 text-white">Integer sagittis</a>--}}
                    {{--                                        <span class="d-flex align-items-center fs-12 text-white"><i--}}
                    {{--                                                    class="fas fa-calendar me-2"></i> 12 May 2021 </span>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="last-posts d-flex ">--}}
                    {{--                                    <a href="#!" class="post d-block">--}}
                    {{--                                        <img src="{{ asset('assets/img/vcard11/last-post3.jpeg') }}"--}}
                    {{--                                             class="w-100 h-100 object-fit-cover">--}}
                    {{--                                    </a>--}}
                    {{--                                    <div class="last-post-desc ps-3">--}}
                    {{--                                        <a href="#!" class="fs-14 text-white">Snowy Mountains Trip</a>--}}
                    {{--                                        <span class="d-flex align-items-center fs-12 text-white"><i--}}
                    {{--                                                    class="fas fa-calendar me-2"></i> 22 Feb 2021 </span>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <!-- end last-post-section -->--}}
                    {{--                            <!-- start subscribe-section -->--}}
                    {{--                            <div class="subscribe-section">--}}
                    {{--                                <div class="section-heading mb-4">--}}
                    {{--                                    <h2 class="fs-22 text-white ps-4">Subscribe</h2>--}}
                    {{--                                </div>--}}
                    {{--                                <form>--}}
                    {{--                                    <input class="email fs-12 mb-3" name="email" placeholder="Your Email"--}}
                    {{--                                           spellcheck="false" type="text" required/>--}}
                    {{--                                    <button type="submit" class="btn btn-primary fs-12 w-100">Submit</button>--}}
                    {{--                                </form>--}}
                    {{--                            </div>--}}
                    {{--                            <!-- end subscribe-section -->--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </section>
        </div>
    </div>
@endsection

