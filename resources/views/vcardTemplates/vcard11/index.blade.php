@extends('vcardTemplates.vcard11.app')
@section('title')
{{__('auth.home')}}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('page_name')
    {{__('auth.about')}}
@endsection
@section('content')
    <div class="tab-content p-sm-4 p-3" id="v-pills-tabContent" style="word-break: keep-all;">
        <div class="home-tab tab-pane fade show active" id="v-pills-home" role="tabpanel"
             aria-labelledby="v-pills-home-tab">
            <div class="hero-about">
                <div class="row">
                    <div class=" col-xl-6">
                        <p class="text-white  mb-1" style="word-break: keep-all:">{{ $vcard->occupation }}</p>
                        <h2 class="text-white fs-34 fw-5 mb-4 d-inline-block">  {{ strtoupper($vcard->first_name.' '.$vcard->last_name) }}</h2>
                        <p class="text-white fs-20 mb-2">{{__('messages.common.description')}}</p>
                        <div class="text-white fs-14 mb-3 fw-normal" style="word-break: keep-all:">
                            {!! $vcard->description !!}
                        </div>
                    </div>
                    @if(isset($vcard->first_name))
                    <div class="col-xl-6 ps-3">
                        <div class="desc">
                            <div class=" d-flex mb-2 ">
                                <div class="icon me-4">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="">
                                    <span>{{__('messages.common.name')}} :</span>
                                    <a class="ps-2 fs-14">{{ strtoupper($vcard->first_name.' '.$vcard->last_name) }}</a>
                                </div>
                            </div>
                            @if($vcard->job_title)
                            <div class=" d-flex mb-2">
                                <div class="icon me-4">
                                    <i class="fa-sharp fa-solid fa-bicycle"></i>
                                </div>
                                <div class="">
                                    <span>{{__('messages.user.job_title')}} :</span>
                                    <a class="ps-2 fs-14">{!! ucwords($vcard->job_title) !!}</a>
                                </div>
                            </div>
                            @endif
                            @if($vcard->location)
                            <div class=" d-flex mb-2">
                                <div class="icon me-4">
                                    <i class="fa-sharp fa-solid fa-location-dot"></i>
                                </div>
                                <div class="">
                                    <span>{{__('messages.user.location')}} :</span>
                                    <a class="ps-2 fs-14">{!! ucwords($vcard->location) !!}</a>
                                </div>
                            </div>
                            @endif
                            @if($vcard->dob)
                            <div class=" d-flex mb-2">
                                <div class="icon me-4">
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <div class="">
                                    <span>{{__('messages.vcard.dob')}} :</span>
                                    <a class="ps-2 fs-14">{{$vcard->dob}}</a>
                                </div>
                            </div>
                            @endif
                            @if($vcard->phone || $vcard->alternative_phone)
                            <div class=" d-flex mb-2">
                                <div class="icon me-4">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="d-flex ">
                                    <span>{{__('auth.contact')}}&nbsp:</span>
                                    <div class="d-flex flex-wrap">
                                    @if($vcard->phone)
                                        <a href="tel:+{{ $vcard->region_code }}{{ $vcard->phone }}"
                                            class="ps-2 fs-14">+ {{ $vcard->region_code }}
                                            {{ $vcard->phone }}</a>
                                    @endif
                                    @if($vcard->alternative_phone)
                                        <a href="tel:+{{ $vcard->alternative_region_code }}{{ $vcard->alternative_phone }}"
                                            class="ps-2 fs-14">+ {{ $vcard->alternative_region_code }}
                                            {{ $vcard->alternative_phone }}</a>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                            {{-- <a href="{{ route('vcard.show.portfolio',$vcard->url_alias) }}" --}}
                            {{--    class="btn btn-primary fs-14 mt-3">MY PORTFOLIO<i --}}
                            {{--       class="fa-solid fa-arrow-right text-white ms-3"></i></a> --}}
                        </div>
                    </div>
                    @endif
                </div>
                {{--                <div class="row">--}}
                {{--                    <div class="col-sm-4 col-6 text-white text-center py-4">--}}
                {{--                        <h2 class="fs-1 fw-6">--}}
                {{--                            <span class="counter" data-countto="145" data-duration="3000">0</span>--}}
                {{--                        </h2>--}}
                {{--                        <h3 class="fs-6 mb-0 mt-3">FINISHED PROJECTS</h3>--}}
                {{--                    </div>--}}
                {{--                    <div class="col-sm-4 col-6 text-white text-center py-4">--}}
                {{--                        <h2 class="fs-1 fw-6">--}}
                {{--                            <span class="counter" data-countto="825" data-duration="3000">0</span>--}}
                {{--                        </h2>--}}
                {{--                        <h3 class="fs-6 mb-0 mt-3">WORKING HOURS</h3>--}}
                {{--                    </div>--}}
                {{--                    <div class="col-sm-4 col-6 text-white text-center py-4">--}}
                {{--                        <h2 class="fs-1 fw-6">--}}
                {{--                            <span class="counter" data-countto="15" data-duration="3000">0</span>--}}
                {{--                        </h2>--}}
                {{--                        <h3 class="fs-6 mb-0 mt-3">AWARDS WON</h3>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
            <!-- start services section -->
            @if(checkFeature('services') && $vcard->services->count())
                <section class="services-section pt-30 mt-5">
                    <div class="section-heading mb-40">
                        <h2 class="fs-22 text-white ps-4">{{__('messages.services')}}</h2>
                    </div>
                    <?php $serviceCount = 1 ?>
                    <div class="row">
                        @foreach($vcard->services as $service)
                            <div class="col-md-6 mb-sm-5 mb-4">
                                <div class="card flex-sm-row p-sm-4 p-3 h-100">
                                    <div class="tag d-flex justify-content-center align-items-center">
                                        <span class="fs-6 text-white">{{ $serviceCount++ }}</span>
                                    </div>
                                    <div class="card-img-top">
                                        <img src="{{ $service->service_icon }}" height="70" width="70"
                                             class="object-fit-cover  custom-border-radius">
                                    </div>
                                    <div class="card-body p-0 ps-sm-4 pt-sm-0 pt-3">
                                        <a class="text-decoration-none text-white"
                                           href="{{ $service->service_url ?? 'javascript:void(0)' }}" target="{{ $service->service_url ? '_blank' : ''  }}">
                                            <h5 class="card-title fs-18">{{ $service->name }}</h5>
                                            {{--                                        @php--}}
                                            {{--                                            $service->description = strlen($service->description) > 200 ? substr($service->description,0,200).'..                                                         .':$service->description--}}

                                            {{--                                        @endphp--}}
                                            <p class="card-text fs-14 pb-4 mb-0 {{ \Illuminate\Support\Str::length($service->description) > 80 ? 'more' : ''}}">
                                                {!! $service->description !!}
                                            </p>
                                        </a>
                                        {{--                                        <div class="d-flex flex-wrap pt-3">--}}
                                        {{--                                            <span class="fs-12 text-white me-3">CODE</span>--}}
                                        {{--                                            <span class="fs-12 text-white me-3">DESIGN</span>--}}
                                        {{--                                            <span class="fs-12 text-white ">PHOTOSHOP</span>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </section>
            @endif
        <!-- start product section -->
            @if(checkFeature('products') && $vcard->products->count())
                <section class="services-section pt-30">
                    <div class="section-heading mb-5">
                        <h2 class="fs-22 text-white ps-4">{{__('messages.feature.products')}}</h2>
                    </div>
                    <?php $ProductCount = 1 ?>
                    <div class="row">
                        @foreach($vcard->products as $product)
                            <div class="col-md-6 mb-sm-5 mb-4">
                                <a @if($product->product_url) href="{{ $product->product_url }}" @endif>
                                    <div class="card flex-sm-row p-sm-4 p-3 h-100">
                                        <div class="tag d-flex justify-content-center align-items-center">
                                            <span class="fs-6 text-white">{{ $ProductCount++ }}</span>
                                        </div>
                                        <div class="card-img-top">
                                            <a @if($product->product_url) href="{{ $product->product_url }}"
                                               target="_blank" @endif>
                                                <div class="card-img-top">
                                                    <img src="{{ $product->product_icon }}"
                                                         class="w-100 h-100 object-fit-cover custom-border-radius">
                                                </div>
                                        </div>
                                        <div class="card-body p-0 ps-sm-4 pt-sm-0 pt-3">
                                            <h5 class="card-title fs-18">{{ $product->name }}</h5>
                                            @if($product->currency_id && $product->price)
                                                <p class=" fs-14 pb-4 mb-0">
                                                    {{$product->currency->currency_icon}}{{$product->price}}
                                                </p>
                                            @elseif($product->price)
                                                <p class=" fs-14 pb-4 mb-0">{{$product->price}}</p>
                                            @else
                                                <!-- <p class=" fs-14 pb-4 mb-0">N/A</p> -->
                                            @endif
                                            <p class="card-text fs-14 pb-4 mb-0">
                                                {!! $product->description !!}
                                            </p>
                                            {{--                                        <div class="d-flex flex-wrap pt-3">--}}
                                            {{--                                            <span class="fs-12 text-white me-3">CODE</span>--}}
                                            {{--                                            <span class="fs-12 text-white me-3">DESIGN</span>--}}
                                            {{--                                            <span class="fs-12 text-white ">PHOTOSHOP</span>--}}
                                            {{--                                        </div>--}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
            <!-- end services section -->

            <!-- start testimonials-section -->
            {{--testimonial--}}
            @if(checkFeature('testimonials') && $vcard->testimonials->count())
                <section class="testimonials-section position-relative mt-4 ">
                    @php $testimonialCount = 1;
                 $style = 'style';
                 $marginBottom = 'margin-bottom';
                    @endphp
                    <div class="section-heading ">
                        <h2 class="fs-22 text-white ps-4 " {{$style}}="{{$marginBottom}}: -10px;"
                        >{{__('messages.feature.testimonials')}}</h2>
                    </div>
                    <div class="slick-slider">
                        @foreach($vcard->testimonials as $testimonial)
                            <div class="col element element-1 @if($vcard->testimonials->count()==1) custom-margin-testimonial @endif h-100 m-0 mt-3 ">
                                <a class="fs-14 ps-3"></a>
                                <div class="card testimonial-2card-custom  mb-3 me-4 flex-sm-row p-4 h-100">
                                    <div class="tag d-flex justify-content-center align-items-center">
                                        <span class="fs-6 text-white">{{ $testimonialCount++ }}</span>
                                    </div>
                                    <div class="card-img-top">
                                        <img src="{{ $testimonial->image_url }}"
                                             class="w-100 h-100 object-fit-cover">
                                    </div>
                                    <div class="card-body p-0 ps-sm-4 pt-sm-0 pt-3">
                                        <h5 class="card-title fs-18">{{ucwords( $testimonial->name) }}</h5>
                                        <p class="card-text fs-14 {{ \Illuminate\Support\Str::length($testimonial->description) > 80 ? 'more' : ''}} mb-0" style="word-break: keep-all:">
                                            "{!! $testimonial->description !!} "
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
        <!-- end testimonials-section -->
            <!-- start client-section -->
            @if(checkFeature('gallery') && $vcard->gallery->count())
                <section class="client-section">
                    <div class="section-heading mb-4">
                        <h2 class="fs-22 text-white ps-4 mt-5">{{__('messages.feature.gallery')}}</h2>
                    </div>
                    <div class="row">
                        @foreach($vcard->gallery as $file)
                            @php
                                $infoPath = pathinfo(public_path($file->gallery_image));
                              $extension = $infoPath['extension'];
                            @endphp
                            <div class="col-md-3 col-6  mt-3">
                                <div class="client-box w-100 h-100 py-3">
                                    <div class="client-img">
                                        @if($file->type == App\Models\Gallery::TYPE_IMAGE)
		                                    <a href="{{$file->gallery_image}}" data-lightbox="gallery-images"><img src="{{ $file->gallery_image }}"
		                                                                                                           class="w-100 h-100 object-fit-cover rounded"></a>
                                        @elseif($file->type == App\Models\Gallery::TYPE_FILE)
                                            <a id="file_url" href="{{$file->gallery_image}}"
                                               class="gallery-link gallery-file-link" target="_blank">
                                                @if($extension=='pdf')
                                                    <img src="{{ asset('assets/images/vcard-file.png') }}"
                                                         class="w-100 h-100 object-fit-cover rounded">
                                                @endif
                                                @if($extension=='xls')
                                                    <img src="{{ asset('assets/images/xls.png') }}"
                                                         class="w-100 h-100 object-fit-cover rounded">
                                                @endif
                                                @if($extension=='csv')
                                                    <img src="{{ asset('assets/images/csv-file.png') }}"
                                                         class="w-100 h-100 object-fit-cover rounded">
                                                @endif
                                                @if($extension=='xlsx')
                                                    <img src="{{ asset('assets/images/xlsx.png') }}"
                                                         class="w-100 h-100 object-fit-cover rounded">
                                                @endif
                                            </a>
                                        @else
                                        <iframe id="video_url" src="https://www.youtube.com/embed/{{YoutubeID($file->link)}}" data-id="https://www.youtube.com/embed/{{YoutubeID($file->link)}}" 
                                            style="width: 100%; height: 100%;"
                                            />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <iframe id="video" src="//www.youtube.com/embed/Q1NKMPhP8PY"
                                        class="w-100" height="315">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
            <div class="d-flex justify-content-center mt-5 text-white">
                @if(checkFeature('advanced'))
                    @if(checkFeature('advanced')->hide_branding && $vcard->branding == 0)
                        @if($vcard->made_by)
                            <a @if(!is_null($vcard->made_by_url)) href="{{$vcard->made_by_url}}"
                               @endif class="text-center text-decoration-none text-white" target="_blank">
                                <small>Made by {{ $vcard->made_by }}</small></a>
                        @endif
                    @else
                        <div class="text-center">
                            <small>Made by {{ $setting['app_name'] }}</small>
                        </div>
                    @endif
                @endif
            </div>
@endsection

