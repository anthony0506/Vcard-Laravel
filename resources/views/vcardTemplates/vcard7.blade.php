<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    @if(checkFeature('seo'))
        @if($vcard->meta_description)
            <meta name="description" content="{{$vcard->meta_description}}">
        @endif
        @if($vcard->meta_keyword)
            <meta name="keywords" content="{{$vcard->meta_keyword}}">
        @endif
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(checkFeature('seo') && $vcard->site_title && $vcard->home_title)
        <title>{{ $vcard->home_title }} | {{ $vcard->site_title }}</title>
    @else
        <title>{{ $vcard->name }} | {{ getAppName() }}</title>
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">

    <title>{{ $vcard->name }} | {{ getAppName() }}</title>
	<!-- Favicon -->
	<link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">

	{{--css link--}}
	<link rel="stylesheet" href="{{ asset('assets/css/vcard7.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/custom-vcard.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">

	@if(checkFeature('custom-fonts') && $vcard->font_family)
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family={{$vcard->font_family}}">
	@endif

	@if($vcard->font_family || $vcard->font_size || $vcard->custom_css)
		<style>
            @if(checkFeature('custom-fonts'))
                @if($vcard->font_family)
                    body {
                        font-family: {{$vcard->font_family}};
                    }
                @endif
                @if($vcard->font_size)
                    div > h4 {
                        font-size: {{$vcard->font_size}}px !important;
                    }
                @endif
            @endif
            @if(isset(checkFeature('advanced')->custom_css))
                {!! $vcard->custom_css !!}
            @endif
        </style>
    @endif
</head>
<body>

<div class="container main-section">
    @include('vcards.password')
    <div class="row d-flex justify-content-center content-blur">
        <div class="main-bg p-0 collapse show allSection">
            <div class="main-banner position-relative">
                <img src="{{ $vcard->cover_url }}" class="banner-img"/>
                <div class="d-flex justify-content-end position-absolute top-0 end-0 me-3">
                    @if($vcard->language_enable == \App\Models\Vcard::LANGUAGE_ENABLE)
                        <div class="language pt-4 me-2">
                            <ul class="text-decoration-none">
                                <li class="dropdown1 dropdown lang-list">
                                    <a class="dropdown-toggle lang-head text-decoration-none" data-toggle="dropdown"
                                       role="button"
                                       aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-language me-2"></i>{{getLanguage($vcard->default_language)}}
                                    </a>
                                    <ul class="dropdown-menu start-0 top-dropdown lang-hover-list top-100">
                                        @foreach(getAllLanguage() as $key => $language)
                                            <li class="{{ getLanguageIsoCode($vcard->default_language) == $key ? 'active' : '' }}">
                                                <a href="javascript:void(0)" id="languageName"
                                                   data-name="{{ $key }}">
                                                    @if(array_key_exists($key,\App\Models\User::FLAG))
                                                        @foreach(\App\Models\User::FLAG as $imageKey=> $imageValue)
                                                            @if($imageKey == $key)
                                                                <img src="{{asset($imageValue)}}" class="me-1">
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <i class="fa fa-flag fa-xl me-3 text-danger"
                                                           aria-hidden="true"></i>
                                                    @endif
                                                    {{ $language }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
            <div class="container" style="word-break: keep-all;">
                <div class="main-profile">
                    <div class="profile-img py-8">
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="user-profile">
                                    <img src="{{ $vcard->profile_url }}"
                                         class="img-fluid rounded-circle"/>
                                </div>
                                <div class="ms-3">
                                    <h4 class="big-title">{{ ucwords($vcard->first_name.' '.$vcard->last_name) }}</h4>
                                    <p class="small-title mb-0" style="word-break: keep-all:">{{ ucwords($vcard->occupation) }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-5">
                                <span class="pt-2  profile-description" style="word-break: keep-all:">{!! $vcard->description !!}</span>
                            </div>
                            <div class="social-section mb-4">
                                <div class="container px-md-5 px-0">
                                    @if(checkFeature('social_links') && getSocialLink($vcard))
                                        <div class="social-icon d-flex justify-content-center">
                                            <div class="pro-icon">
                                                @foreach(getSocialLink($vcard) as $value)
                                                    {!! $value !!}
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if($vcard->email)
                                <div class="col-sm-6 mb-4">
                                    <div class="card border-0 bg-transparent h-100">
                                        <div class="event-icon text-center h-100">
                                            <div>
                                                <img src="{{asset('assets/img/vcard7/email.png')}}"
                                                     class="img-fluid mb-2"/>
                                            </div>
                                            <span class="event-title">{{ __('messages.vcard.email_address') }}</span>
                                            <a href="mailto:{{ $vcard->email }}"
                                               class="mb-0 event-text text-decoration-none">{{ $vcard->email }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($vcard->alternative_email)
                                <div class="col-sm-6 mb-4">
                                    <div class="card border-0 bg-transparent h-100">
                                        <div class="event-icon text-center h-100">
                                            <div>
                                                <img src="{{asset('assets/img/vcard7/alter-image.png')}}"
                                                        class="img-fluid mb-2" height="33" width="34"/>
                                            </div>
                                            <span class="event-title">{{ __('messages.vcard.alter_email_address') }}</span>
                                            <a href="mailto:{{ $vcard->alternative_email }}"
                                                class="mb-0 event-text text-decoration-none">{{ $vcard->alternative_email }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($vcard->phone)
                                <div class="col-sm-6 mb-4">
                                    <div class="card border-0 bg-transparent h-100">
                                        <div class="event-icon text-center h-100">
                                            <div>
                                                <img src="{{asset('assets/img/vcard7/phone.png')}}"
                                                        class="img-fluid mb-2"/>
                                            </div>
                                            <span class="event-title">{{ __('messages.vcard.mobile_number') }}</span>
                                            <br>
                                            <a href="tel:+{{ $vcard->region_code }}{{ $vcard->phone }}"
                                                class="mb-0 event-text text-decoration-none">+{{ $vcard->region_code }}
                                                -{{ $vcard->phone }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($vcard->alternative_phone)
                                <div class="col-sm-6 mb-4">
                                    <div class="card border-0 bg-transparent h-100">
                                        <div class="event-icon text-center h-100">
                                            <div>
                                                <img src="{{asset('assets/img/vcard7/alter-phone.png')}}"
                                                        class="img-fluid mb-2"/>
                                            </div>
                                            <span class="event-title">{{ __('messages.vcard.alter_mobile_number') }}</span>
                                            <br>
                                            <a href="tel:+{{ $vcard->alternative_region_code }} {{ $vcard->alternative_phone }}"
                                                class="mb-0 event-text text-decoration-none">+{{ $vcard->alternative_region_code }}
                                                -{{ $vcard->alternative_phone }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($vcard->dob)
                                <div class="col-sm-6 mb-4">
                                    <div class="card border-0 bg-transparent h-100">
                                        <div class="event-icon text-center h-100">
                                            <div>
                                                <img src="{{asset('assets/img/vcard7/cake.png')}}"
                                                    class="img-fluid mb-2"/>
                                            </div>
                                            <span class="event-title">{{ __('messages.vcard.dob') }}</span>
                                            <p class="mb-0 event-text">{{ $vcard->dob }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($vcard->location)
                                <div class="col-sm-6 mb-4">
                                    <div class="card border-0 bg-transparent h-100">
                                        <div class="event-icon text-center h-100">
                                            <div>
                                                <img src="{{asset('assets/img/vcard7/location.png')}}"
                                                     class="img-fluid mb-2"/>
                                            </div>
                                            <span class="event-title">{{ __('messages.vcard.location') }}</span>
                                            <p class="mb-0 event-text">{{ ucwords($vcard->location) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($vcard->job_title)
                                <div class="col-sm-6 mb-4">
                                    <div class="card border-0 bg-transparent h-100">
                                        <div class="event-icon text-center h-100">
                                            <div>
                                                <img src="{{asset('assets/img/vcard7/job_title.png')}}"
                                                     class="img-fluid mb-2" alt="job" style="width: 30px;"/>
                                            </div>
                                            <span class="event-title">{{ __('messages.vcard.job_title') }}</span>
                                            <p class="mb-0 event-text">{{ ucwords($vcard->job_title) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
	        {{--Qrcode--}}
	        <div class="container mt-4 mb-13 ">
                <div class="main-Qr-section mb-5">
                    <div class="qr-header-title">
                        <h4 class="mb-4 text-center">{{ __('messages.vcard.qr_code') }}</h4>
			        </div>
			        <div class="row d-flex align-items-center">
				        <div class="col-lg-12">
					        <div class="text-center mb-4 qr-code-image d-flex justify-content-around align-itmes-center">
						        {!! QrCode::size(130)->format('svg')->generate(Request::url()); !!}
                                <h4 class="d-flex align-items-center {{$vcard->qr_code_text == null ? 'd-none' : ''}}" style="width: 50%; overflow-wrap: anywhere; padding-left: 10px; padding-right: 10px; justify-content: center; text-align: center;">{{$vcard->qr_code_text}}</h4>
					        </div>
				        </div>
			        </div>
		        </div>
	        </div>
            {{--our services--}}
            @if(checkFeature('services') && $vcard->services->count())
                <div class="container mb-10 mb-10 mt-0">
                    <div class="our-service-title">
                        <h4 class="mb-4 text-center">{{ __('messages.vcard.our_service') }}</h4>
                    </div>
                    <div class="our-service-section">
                        <div class="row g-6">
                            @foreach($vcard->services as $service)
                                <div class="col-sm">
                                    <div class="card service-card">
                                        <a href="{{ $service->service_url ?? "javascript:void(0)"}}"
                                           class="text-decoration-none {{$service->service_url ? 'pe-auto' : 'pe-none'}}"
                                           target="{{ $service->service_url ? '_blank' : ''  }}">
                                            <img src="{{$service->service_icon}}" class="card-img-top service-new-image"
                                                 alt="{{$service->name}}">
                                        </a>
                                        <div class="card-body py-4">
                                            <h5 class="card-title title-text">{{ ucwords($service->name) }}</h5>
                                            <p class="card-text description-text {{ \Illuminate\Support\Str::length($service->description) > 80 ? 'more' : ''}}">{!! $service->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            {{--gallery--}}
            @if(checkFeature('gallery') && $vcard->gallery->count())
                <div class="container">
                    <div class="gallery-main-section mb-10 mt-0">
                        <div class="header-gallery">
                            <h2 class="mb-4 text-center">{{ $galleryName }}</h2>
                    </div>
                    <div class="row gallery-slider d-flex justify-content-center g-3">
                        @foreach($vcard->gallery as $file)
                            @php
                                $infoPath = pathinfo(public_path($file->gallery_image));
                              $extension = $infoPath['extension'];
                            @endphp
                            <div class="col-6 h-100">
                                <div class="card shadow-gallery p-3 w-100 border-0 h-100">
                                    <div class="gallery-profile h-100">
                                        @if($file->type == App\Models\Gallery::TYPE_IMAGE)
    		                                <a href="{{$file->gallery_image}}" data-lightbox="gallery-images"><img src="{{$file->gallery_image}}" alt="profile" class="w-100"/></a>
                                        @elseif($file->type == App\Models\Gallery::TYPE_FILE)
                                            <a id="file_url" href="{{$file->gallery_image}}"
                                               class="gallery-link gallery-file-link" target="_blank">
                                                <div class="gallery-item"
                                                     @if($extension=='pdf')
                                                     style="background-image: url({{ asset('assets/images/vcard-file.png') }})">
                                                    @endif
                                                    @if($extension=='xls')
                                                        style="background-image: url({{ asset('assets/images/xls.png') }})">
                                                    @endif
                                                    @if($extension=='csv')
                                                        style="background-image: url({{ asset('assets/images/csv-file.png') }})">
                                                    @endif
                                                    @if($extension=='xlsx')
                                                        style="background-image: url({{ asset('assets/images/xlsx.png') }})">
                                                    @endif
                                                </div>
                                            </a>
                                        @else
                                            <iframe id="video_url_{{YoutubeID($file->link)}}" src="https://www.youtube.com/embed/{{YoutubeID($file->link)}}" 
                                                data-id="https://www.youtube.com/embed/{{YoutubeID($file->link)}}" style="width: 100%; height: 100%;">
                                            </iframe>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

            {{--product--}}
            @if(checkFeature('products') && $vcard->products->count())
                <div class="container mb-5 mt-15">
                    <div class="product-main-section pb-4">
                        <div class="header-product">
                            <h2 class="mb-4 text-center">{{ __('messages.plan.products') }}</h2>
                        </div>
                        <div class="row product-vcard d-flex justify-content-center g-3">
                            @foreach($vcard->products as $product)
                                <div class="col-6 px-3">
                                    <a @if($product->product_url) href="{{ $product->product_url }}" @endif
                                    target="_blank" class="text-decoration-none fs-6">
                                        <div class="card shadow-product w-100 border-0 h-100">
                                            <div class="product-profile">
                                                <img src="{{ $product->product_icon }}" alt="profile" class="w-100"
                                                     height="208px"/>
                                            </div>
                                            <div class="product-details mt-3">
                                                <h4>{{$product->name}}</h4>
                                                <p class="mb-2">
                                                    {{$product->description}}
                                                </p>
                                                @if($product->currency_id && $product->price)
                                                    <span
                                                            class="text-black">{{$product->currency->currency_icon}}{{$product->price}}</span>
                                                @elseif($product->price)
                                                    <span class="text-black">{{$product->price}}</span>
                                                @else
                                                    {{-- <span class="text-black">N/A</span> --}}
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            {{--testimonial--}}
            @if(checkFeature('testimonials') && $vcard->testimonials->count())
                <div class="container mb-5 mt-0">
                    <div class="testimonial-main-section pb-4">
                        <div class="header-testimonial">
                            <h4 class="mb-4 text-center">{{ __('messages.plan.testimonials') }}</h4>
                        </div>
                        <div class="row testimonial-vcard d-flex justify-content-center g-3">
                            @foreach($vcard->testimonials as $testimonial)
                                <div class="col-12 px-4">
                                    <div class="card shadow-testi w-100 border-0 p-sm-4 p-3">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center testimonial-box">
                                                <img src="{{ $testimonial->image_url }}"
                                                     class="testi-logo rounded-circle me-2"/>
                                                <div class="my-2">
                                                    <p class="mb-0 description-testi text-sm-start {{ \Illuminate\Support\Str::length($testimonial->description) > 80 ? 'more' : ''}}" style="width: 370px;">{!! $testimonial->description !!}</p>
                                                    <span
                                                        class="testi-footer-title">{{ ucwords($testimonial->name) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            {{-- blog--}}
            @if(checkFeature('blog') && $vcard->blogs->count())
                <div class="container vcard-seven-blog mb-10 mt-0">
                    <h4 class="mb-4 text-center header-blog">{{ __('messages.feature.blog') }}</h4>
                    <div class="container px-0">
                        <div class="row g-4 blog-slider overflow-hidden">
                            @foreach($vcard->blogs as $blog)
                                <div class="col-6 mb-2">
                                    <div class="card blog-card p-2 border-0 w-100 h-100">
                                        <div class="blog-image">
                                            <a href="{{route('vcard.show-blog',[$vcard->url_alias,$blog->id])}}">
                                                <img src="{{ $blog->blog_icon }}" alt="profile" class="w-100"/>
                                            </a>
                                        </div>
                                        <div class="blog-details mt-3">
                                            <a href="{{route('vcard.show-blog',[$vcard->url_alias,$blog->id])}}" class="text-decoration-none">
                                                <h4 class="text-sm-start text-center title-color text-black p-3 mb-0">{{ $blog->title }}</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            {{--business hour--}}
            @if($vcard->businessHours->count())
                @php
                    $todayWeekName = strtolower(\Carbon\Carbon::now()->rawFormat('D'))
                @endphp
                <div class="container mb-10 mt-0">
                    <div class="business-main-section">
                        <div class="header-title">
                            <h4 class="text-center mb-4">{{ __('messages.business.business_hours') }}</h4>
                        </div>
                        <div class="row g-3">
                            @foreach($businessDaysTime as $key => $dayTime)
                                <div class="col-12">
                                    <div class="card business-card flex-row
                                        {{(\App\Models\BusinessHour::DAY_OF_WEEK[$key] == $todayWeekName) ? 'business-card-today' : ''}}">
                                        <div class="calendar-icon p-4">
                                            <i class="fa-solid fa-calendar-days fs-1 text-white"></i>
                                        </div>
                                        <div class="ms-sm-2 ms-3">
                                            <div class="text-muted ms-sm-5 business-hour-day-text">
                                                {{ __('messages.business.'.\App\Models\BusinessHour::DAY_OF_WEEK[$key]) }}</div>
                                            <div class="ms-sm-5 fw-bold mt-3 fs-4 business-hour-time-text">{{ $dayTime ?? 'Closed' }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            {{--Appointment--}}
            @if(checkFeature('appointments') && $vcard->appointmentHours->count())
                <div class="container py-3 mb-10 mt-0">
                    <h2 class="appointment-heading mb-4 position-relative text-center">{{__('messages.make_appointments')}}</h2>
                    <div class="appointment">
                        <div class="row d-flex align-items-center justify-content-center mb-3">
                            <div class="col-md-2">
                                <label for="date" class="appoint-date mb-2">{{__('messages.date')}}</label>
                            </div>
                            <div class="col-md-10">
                                {{ Form::text('date', null, ['class' => 'date appoint-input', 'placeholder' =>__('messages.form.pick_date'),'id'=>'pickUpDate']) }}
                            </div>
                        </div>
                        <div class="row d-flex align-items-center justify-content-center mb-md-3">
                            <div class="col-md-2">
                                <label for="text" class="appoint-date mb-2">{{__('messages.hour')}}</label>
                            </div>
                            <div class="col-md-10">
                                <div id="slotData" class="row">
                                </div>
                            </div>
                        </div>

                        <button type="button"
                                class="appointmentAdd appoint-btn mt-4 d-block shadow mx-auto btn btn-lg">{{__('messages.make_appointments')}}
                        </button>
                        @include('vcardTemplates.appointment')
                </div>
            </div>
            @endif

            {{--contact us--}}
            @php $currentSubs = $vcard->subscriptions()->where('status', \App\Models\Subscription::ACTIVE)->latest()->first() @endphp
            @if($currentSubs && $currentSubs->plan->planFeature->enquiry_form && $vcard->enable_enquiry_form)
                <div class="container mb-10 mt-0">
                    <div class="contactus-section position-relative">
                        <div class="header-title">
                            <h4 class="text-center mb-4">{{ __('messages.contact_us.contact_us') }}</h4>
                        </div>
                        <div class="main-contact">
                            <form id="enquiryForm">
                                @csrf
                                <div class="row">
                                    <div id="enquiryError" class="alert alert-danger d-none"></div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <label for="basic-url"
                                                   class="form-label mb-0">{{ __('messages.user.your_name') }}</label>
                                            <div class="col-12 mb-3 input-group">
                                    <span class="input-group-text contact-icon bg-transparent border-end-0"
                                          id="basic-addon1"><i
                                                class="far fa-user"></i></span>
                                                <input type="text" name="name"
                                                       class="form-control contact-input bg-transparent border-start-0"
                                                       id="name" placeholder="{{__('messages.form.your_name')}}">
                                            </div>

                                            <label for="basic-url"
                                                   class="form-label mb-0">{{ __('messages.user.email') }}</label>
                                            <div class="col-12 mb-3 input-group">
                                    <span class="input-group-text contact-icon border-end-0 bg-transparent"
                                          id="basic-addon1"><i
                                                class="far fa-envelope"></i></span>
                                                <input type="email" name="email"
                                                       class="form-control contact-input border-start-0 bg-transparent"
                                                       id="email" placeholder="{{__('messages.form.your_email')}}">
                                            </div>

                                            <label for="inputAddress"
                                                   class="form-label mb-0">{{ __('messages.user.phone') }}</label>
                                            <div class="col-12 mb-3 input-group">
                                    <span class="input-group-text contact-icon border-end-0 bg-transparent"
                                          id="basic-addon1"><i
                                                class="fas fa-phone"></i></span>
                                                <input type="tel" name="phone"
                                                       class="form-control contact-input border-start-0 bg-transparent"
                                                       id="phone" placeholder="{{__('messages.form.phone')}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label for="exampleFormControlTextarea1"
                                                       class="form-label mb-0">{{ __('messages.user.your_message') }}</label>
                                                <textarea class="form-control contact-input bg-transparent"
                                                          name="message"
                                                          id="message"
                                                          rows="7"
                                                          placeholder="{{__('messages.form.type_message')}}"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mt-3">
                                        <button type="submit"
                                                class="btn contact-btn px-4">{{ __('messages.contact_us.send_message') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            @if($vcard->location_url && isset($url[5]))
                <div class="m-2 mb-10 mt-0">
                    <iframe width="100%" height="300px" src='https://maps.google.de/maps?q={{$url[5]}}/&output=embed'
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            style="border-radius: 10px;"></iframe>
                </div>
            @endif
            <div class="d-flex justify-content-evenly">
                @if(checkFeature('advanced'))
                    @if(checkFeature('advanced')->hide_branding && $vcard->branding == 0)
                        @if($vcard->made_by)
                            <a @if(!is_null($vcard->made_by_url)) href="{{$vcard->made_by_url}}" @endif
                            class="text-center text-decoration-none text-dark" target="_blank">
                                <small>Made by {{ $vcard->made_by }}</small>
                            </a>
                        @else
                            <div class="text-center">
                                <small>Made by {{ $setting['app_name'] }}</small>
                            </div>
                        @endif
                    @endif
                @else
                    @if($vcard->made_by)
                        <a @if(!is_null($vcard->made_by_url)) href="{{$vcard->made_by_url}}" @endif
                        class="text-center text-decoration-none text-dark" target="_blank">
                            <small>Made by {{ $vcard->made_by }}</small>
                        </a>
                    @else
                        <div class="text-center">
                            <small>Made by {{ $setting['app_name'] }}</small>
                        </div>
                    @endif
                @endif
                @if(!empty($vcard->privacy_policy) || !empty($vcard->term_condition))
                    <div>
                        <a class="text-decoration-none text-dark cursor-pointer terms-policies-btn" href="{{ route('vcard.show-privacy-policy',[$vcard->url_alias,$vcard->id]) }}"><small>{!! __('messages.vcard.term_policy') !!}</small></a>
                    </div>
                @endif
            </div>
	        <div class="w-100 d-flex justify-content-center sticky-vcard-div">
		        <div class="btn-group" role="group" aria-label="Basic example" >
			        <button type="button" class="vcard-btn-group vcard7-sticky-btn rounded-0 px-2 ps-5 py-1" onclick="downloadVcard('{{ $vcard->name }}.vcf',{{ $vcard->id }})"><i class="fas fa-download fs-4"></i></button>
			        <button type="button" class="vcard7-share vcard-btn-group vcard7-sticky-btn rounded-0 px-2 py-1"><i class="fas fa-share-alt fs-4"></i></button>
			        @if(!empty($userSetting['enable_affiliation']))
				        <button type="button" class="vcard-btn-group vcard7-sticky-btn rounded-0 px-2 py-1 copy-referral-btn" data-id="{{ $vcard->user->affiliate_code }}"><i class="fa-regular fa-copy fs-4"></i></button>
			        @endif
			        @if($vcard->enable_download_qr_code)
			        <a type="button" class="vcard-btn-group vcard7-sticky-btn rounded-0 px-2 pe-5 py-2 text-dark" id="qr-code-btn" download="qr_code.png"><i class="fa-solid fa-qrcode fs-4"></i></a>
					@endif
		        </div>
	        </div>
        </div>
    </div>

    {{-- share modal code--}}
    <div id="vcard7-shareModel" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('messages.vcard.share_my_vcard') }}</h5>
                    <button type="button" aria-label="Close" class="btn btn-sm btn-icon btn-active-color-danger"
                            data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                             version="1.1">
							<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                               fill="#000000">
								<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"/>
								<rect fill="#000000" opacity="0.5"
                                      transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                      x="0" y="7" width="16" height="2" rx="1"/>
							</g>
						</svg>
					</span>
                    </button>
                </div>
                @php
                    $shareUrl = route('vcard.show', ['alias' => $vcard->url_alias]);
                @endphp
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 justify-content-between social-link-modal">
                            <a href="http://www.facebook.com/sharer.php?u={{$shareUrl}}"
                               target="_blank" class="mx-2 share7" title="Facebook">
                                <i class="fab fa-facebook fa-2x" style="color: #1B95E0"></i>
                            </a>
                            <a href="http://twitter.com/share?url={{$shareUrl}}&text={{$vcard->name}}&hashtags=sharebuttons"
                               target="_blank" class="mx-2 share7" title="Twitter">
                                <i class="fab fa-twitter fa-2x" style="color: #1DA1F3"></i>
                            </a>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&url={{$shareUrl}}"
                               target="_blank" class="mx-2 share7" title="Linkedin">
                                <i class="fab fa-linkedin fa-2x" style="color: #1B95E0"></i>
                            </a>
                            <a href="mailto:?Subject=&Body={{$shareUrl}}" target="_blank"
                               class="mx-2 share7" title="Email">
                                <i class="fas fa-envelope fa-2x" style="color: #191a19  "></i>
                            </a>
                            <a href="http://pinterest.com/pin/create/link/?url={{$shareUrl}}"
                               target="_blank" class="mx-2 share7">
                                <i class="fab fa-pinterest fa-2x" style="color: #bd081c" title="Pinterest"></i>
                            </a>
                            <a href="http://reddit.com/submit?url={{$shareUrl}}&title={{$vcard->name}}"
                               target="_blank" class="mx-2 share7" title="Reddit">
                                <i class="fab fa-reddit fa-2x" style="color: #ff4500"></i>
                            </a>
                            <a href="https://wa.me/?text={{$shareUrl}}" target="_blank" class="mx-2 share7" title="Whatsapp">
                                <i class="fab fa-whatsapp fa-2x" style="color: limegreen"></i>
                            </a>
                            <span id="vcardUrlCopy{{$vcard->id}}" class="d-none" target="_blank"> {{ route('vcard.show', ['alias' => $vcard->url_alias]) }} </span>
                            <button class="mx-2 copy-vcard-clipboard"
                                    title="Copy Link" data-id="{{ $vcard->id }}">
                                <i class="fa-regular fa-copy fa-2x" style="color: #0099fb"></i>
                            </button>
                        </div>
                    </div>
                    <div class="text-center">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@include('vcardTemplates.template.templates')
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="{{ asset('assets/js/front-third-party.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>
<script>
@if(checkFeature('seo') && $vcard->google_analytics)
    {!! $vcard->google_analytics !!}
@endif
@if(isset(checkFeature('advanced')->custom_js) && $vcard->custom_js)
    {!! $vcard->custom_js !!}
@endif
</script>
@php
    $setting = \App\Models\UserSetting::where('user_id', $vcard->tenant->user->id)->where('key', 'stripe_key')->first();
@endphp
<script>
    let stripe = ''
    @if (!empty($setting) && !empty($setting->value))
        stripe = Stripe('{{ $setting->value }}');
    @endif
    $('.testimonial-vcard').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        autoplay: true,
        prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow next-arrow"></button>',
        responsive: [
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true,
                },
            },
        ],
    });
</script>
<script>
    $('.gallery-slider').slick({
        dots: true,
        infinite: true,
        arrows: true,
        speed: 300,
        slidesToShow: 2,
        autoplay: true,
        slidesToScroll: 1,
        prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow next-arrow"></button>',
        responsive: [
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true,
                },
            }
        ]
    });

    $('.blog-slider').slick({
        dots: true,
        infinite: true,
        arrows: true,
        speed: 300,
        slidesToShow: 1,
        autoplay: true,
        slidesToScroll: 1,
        prevArrow: '<button class="product-slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="product-slide-arrow next-arrow"></button>',
    })
</script>
<script>
    $('.product-vcard').slick({
        dots: true,
        infinite: true,
        arrows: true,
        speed: 300,
        slidesToShow: 2,
        autoplay: true,
        slidesToScroll: 1,
        prevArrow: '<button class="slide-arrow-blog prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow-blog next-arrow"></button>',
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
    let isEdit = false;
    let password = "{{isset(checkFeature('advanced')->password) && !empty($vcard->password) }}"
    let passwordUrl = "{{ route('vcard.password', $vcard->id) }}";
    let enquiryUrl = "{{ route('enquiry.store',  ['vcard' => $vcard->id, 'alias' => $vcard->url_alias]) }}";
    let appointmentUrl = "{{ route('appointment.store', ['vcard' => $vcard->id, 'alias' => $vcard->url_alias]) }}";
    let slotUrl = "{{route('appointment-session-time',$vcard->url_alias)}}";
    let appUrl = "{{ config('app.url') }}";
    let vcardId = {{$vcard->id}};
    let vcardAlias = "{{$vcard->url_alias}}";
    let paypalUrl = "{{ route('paypal.init') }}"
    let languageChange = "{{ url('language') }}";
    let lang = "{{checkLanguageSession($vcard->url_alias)}}";
</script>
<script>
    const svg = document.getElementsByTagName('svg')[0];
    const blob = new Blob([svg.outerHTML], { type: 'image/svg+xml' });
    const url = URL.createObjectURL(blob);
    const image = document.createElement('img');
    image.src = url;
    image.addEventListener('load', () => {
        const canvas = document.createElement('canvas');
        canvas.width = canvas.height = {{ $vcard->qr_code_download_size }};
        const context = canvas.getContext('2d');
        context.drawImage(image, 0, 0, canvas.width, canvas.height);
        const link = document.getElementById('qr-code-btn');
        link.href = canvas.toDataURL();
        URL.revokeObjectURL(url);
    });
</script>
@routes
<script src="{{ asset('assets/js/messages.js') }}"></script>
<script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
<script src="{{ mix('assets/js/vcards/vcard-view.js') }}"></script>
<script src="{{ mix('assets/js/lightbox.js') }}"></script>
</body>
</html>
