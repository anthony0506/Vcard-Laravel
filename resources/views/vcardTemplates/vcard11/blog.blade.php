@extends('vcardTemplates.vcard11.app')
@section('title')
    {{ __('messages.feature.blog') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('page_name')
    {{ __('messages.feature.blog') }}
@endsection
@section('content')
    <div class="tab-content p-sm-4 p-3" id="v-pills-tabContent">
        <div class="blog-tab tab-pane fade show active" id="v-pills-blog" role="tabpanel"
             aria-labelledby="v-pills-blog-tab">
            <!-- start blog-section -->
            <section class="blog-section">
                <div class="row">
                    <div class="col-lg-8">
                        @foreach($vcard->blogs->reverse() as $blog)
                            <div class="blog-post mb-4">
                                <div class="section-heading mb-4">
                                    <h2 class="fs-22 text-white ps-4 mb-1">{{ $blog->title }}</h2>
                                    <div class="ps-4">
                                        <span class="fs-14 "><i class="fa-regular fa-calendar"></i></span>
                                        <span class="fs-12 text-white">  {{ \Carbon\Carbon::parse($blog->created_at)->isoFormat('Do MMMM YYYY')}}</span>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                        {{--                                        <div class="carousel-indicators ">--}}
                                        {{--                                            <button type="button" data-bs-target="#carouselExampleIndicators"--}}
                                        {{--                                                    data-bs-slide-to="0" class="active" aria-current="true"--}}
                                        {{--                                                    aria-label="Slide 1"></button>--}}
                                        {{--                                            <button type="button" data-bs-target="#carouselExampleIndicators"--}}
                                        {{--                                                    data-bs-slide-to="1" aria-label="Slide 2"></button>--}}
                                        {{--                                            <button type="button" data-bs-target="#carouselExampleIndicators"--}}
                                        {{--                                                    data-bs-slide-to="2" aria-label="Slide 3"></button>--}}
                                        {{--                                        </div>--}}
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{ $blog->blog_icon }}"
                                                     class="w-100 h-100 object-fit-cover rounded">
                                            </div>
                                        </div>
                                        {{--                                        <div class="d-none d-md-block">--}}
                                        {{--                                        <button class=" carousel-control-prev" type="button"--}}
                                        {{--                                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">--}}
                                        {{--                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
                                        {{--                                            <span class="visually-hidden">Previous</span>--}}
                                        {{--                                        </button>--}}
                                        {{--                                        <button class=" carousel-control-next" type="button"--}}
                                        {{--                                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">--}}
                                        {{--                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
                                        {{--                                            <span class="visually-hidden">Next</span>--}}
                                        {{--                                        </button>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                    <div id="myModalbox" class="modalbox">
                                        <span class="close cursor" onclick="closeModalBox()">&times;</span>
                                        <div class="modal-content">
                                            <div class="mySlidesbox">
                                                <img src="{{ $blog->blog_icon }}"
                                                     style="width:100%">
                                            </div>
                                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-post-desc ">
                                    {{--                                    <div class="desc d-flex flex-wrap align-items-center mb-4 pt-2">--}}
                                    {{--                                        <div class="me-4">--}}
                                    {{--                                        <span class="fs-14 me-2"><i class="fa-regular fa-eye"></i></span>--}}
                                    {{--                                        <span class="fs-12 text-white"> 164 views</span>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="">--}}
                                    {{--                                        <span class="fs-14 me-2"><i class="fa-regular fa-message"></i></span>--}}
                                    {{--                                        <span class="fs-12 text-white">3 commnets</span>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>  --}}
                                    <p class="fs-14 text-white mb-4">
                                        @php
                                            $blog->description = strlen($blog->description) > 200 ? substr($blog->description,0,200).'....':$blog->description
                                        @endphp
                                        {!! $blog->description !!}
                                    </p>
                                    <a href="{{ route('vcard.show.blog-single',['alias'=>$vcard->url_alias,'id'=>$blog->id]) }}"
                                       class="btn btn-primary fs-14">{{__('messages.vcard_11.read_more')}}</a>
                                </div>
                            </div>
                            @if($loop->iteration==3)
                                @break
                            @endif
                        @endforeach
                        {{--                        <nav aria-label="Page navigation example">--}}
                        {{--                            <ul class="pagination justify-content-center">--}}
                        {{--                                <li class="page-item"><a class="page-link" href="#"><i--}}
                        {{--                                                class="fa-solid fa-angles-left"></i></a></li>--}}
                        {{--                                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                        {{--                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                        {{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                        {{--                                <li class="page-item"><a class="page-link" href="#"><i--}}
                        {{--                                                class="fa-solid fa-angles-right"></i></a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </nav>--}}
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-right-section">
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
                        <!-- end categories-section -->
                            <!-- start last-post-section -->
                            <div class="last-post-section mb-4">
                                <div class="section-heading mb-4">
                                    <h2 class="fs-22 text-white ps-4">{{__('messages.vcard_11.Latest_post')}}</h2>
                                </div>
                                @foreach($vcard->blogs->reverse() as $blog)
                                    <div class="last-posts d-flex">
                                        <a href="{{ route('vcard.show.blog-single',['alias'=>$vcard->url_alias,'id'=>$blog->id]) }}"
                                           class="post d-block">
                                            <img src="{{ $blog->blog_icon }}"
                                                 class="w-100 h-100 object-fit-cover rounded">
                                        </a>
                                        @php
                                            $blog->title = strlen($blog->title) > 20 ? substr($blog->title,0,20).'...':$blog->title
                                        @endphp
                                        <div class="last-post-desc ps-3">
                                            <a href="{{ route('vcard.show.blog-single',['alias'=>$vcard->url_alias,'id'=>$blog->id]) }}"
                                               class="fs-14 text-white">{{ $blog->title }}</a>
                                            <span class="d-flex align-items-center fs-12 text-white"><i
                                                        class="fas fa-calendar me-2"></i> {{ \Carbon\Carbon::parse($blog->created_at)->isoFormat('Do MMMM YYYY')}} </span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <!-- end last-post-section -->
                            <!-- start subscribe-section -->
                        {{--                            <div class="subscribe-section">--}}
                        {{--                                <div class="section-heading mb-4">--}}
                        {{--                                    <h2 class="fs-22 text-white ps-4">Subscribe</h2>--}}
                        {{--                                </div>--}}
                        {{--                                <form>--}}
                        {{--                                    <input class="email fs-12 mb-3" name="EMAIL" placeholder="Your Email"--}}
                        {{--                                           spellcheck="false" type="text" required/>--}}
                        {{--                                    <button type="submit" class="btn btn-primary fs-12 w-100">Submit</button>--}}
                        {{--                                </form>--}}
                        {{--                            </div>--}}
                        <!-- end subscribe-section -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- end blog-section -->
        </div>
    </div>
@endsection
