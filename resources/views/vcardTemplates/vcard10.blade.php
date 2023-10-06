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

	{{--css link--}}
	<link rel="stylesheet" href="{{ asset('assets/css/vcard10.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/custom-vcard.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">


	{{--google Font--}}
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto&display=swap" rel="stylesheet">

	<title>{{ $vcard->name }} | {{ getAppName() }}</title>
	<!-- Favicon -->
	<link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">
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
<div class="container p-0">
    @include('vcards.password')
    <div class="vcard-ten main-content w-100 mx-auto overflow-hidden content-blur collapse show allSection">
        {{--banner--}}
        <div class="vcard-ten__banner w-100 position-relative px-2">
            <img src="{{ $vcard->cover_url }}" class="img-fluid banner-image" alt="banner"/>
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
                                                    <i class="fa fa-flag fa-xl me-3 text-danger" aria-hidden="true"></i>
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
        {{--profile--}}
        <div class="vcard-ten__profile position-relative shadow mx-sm-5 mx-4 ">
            <div class=" d-flex flex-sm-row flex-column justify-content-center align-items-center">
                <div class="avatar">
                    <img src="{{ $vcard->profile_url }}" alt="profile-img" class="rounded-circle"/>
                </div>
                <div class="mx-4 mt-sm-0 mt-3">
                    <h4 class="profile-name text-sm-start text-center">{{ ucwords($vcard->first_name.' '.$vcard->last_name) }}</h4>
                    <span class="profile-designation text-sm-start text-center d-block" style="word-break: keep-all:">{{ ucwords($vcard->occupation) }}</span>
                </div>

            </div>
            <div class="d-flex align-items-center mb-5">
                <span class="pt-5 profile-description" style="word-break: keep-all:"> {!! $vcard->description !!}</span>
            </div>
        </div>

        {{--profile details--}}

        <div class="vcard-ten__profile-details py-4 px-3">
            @if(checkFeature('social_links') && getSocialLink($vcard))
                <div class="social-icons d-flex justify-content-center pt-4 flex-wrap">
                    @foreach(getSocialLink($vcard) as $value)
                        {!! $value !!}
                    @endforeach
                </div>
            @endif
        </div>

        {{--event--}}
        <div class="vcard-ten__event py-4 px-sm-3 px-2 position-relative">
            <div class="container mt-4" style="word-break: keep-all;">
                <div class="row g-3">
                    @if($vcard->email)
                        <div class="col-sm-6 col-12">
                            <div class="card event-card p-3 h-100 border-0 flex-sm-row flex-column align-items-center shadow">
                            <span class="event-icon d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/vcard10/vcard10-email.png')}}" alt="email"/>
                            </span>
                                <div class="event-detail ms-sm-3 mt-sm-0 mt-4">
                                    <h6 class="event-title text-sm-start text-center">{{ __('messages.vcard.email_address') }}</h6>
                                    <h5><a href="mailto:{{ $vcard->email }}" class="event-name text-sm-start text-center mb-0 text-decoration-none">{{ $vcard->email }}</a></h5>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($vcard->alternative_email)
                        <div class="col-sm-6 col-12">
                            <div class="card event-card p-3 h-100 border-0 flex-sm-row flex-column align-items-center shadow">
                        <span class="event-icon d-flex justify-content-center align-items-center">
                            <img src="{{asset('assets/img/vcard10/alter-email.png')}}" alt="email" height="19" width="25"/>
                        </span>
                                <div class="event-detail ms-sm-3 mt-sm-0 mt-4">
                                    <h6 class="event-title text-sm-start text-center">{{ __('messages.vcard.alter_email_address') }}</h6>
                                    <h5><a href="mailto:{{ $vcard->alternative_email }}" class="event-name text-sm-start text-center mb-0 text-decoration-none">{{ $vcard->alternative_email }}</a></h5>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($vcard->phone)
                        <div class="col-sm-6 col-12">
                            <div class="card event-card p-3 h-100 border-0 flex-sm-row flex-column align-items-center shadow">
                        <span class="event-icon d-flex justify-content-center align-items-center">
                            <img src="{{asset('assets/img/vcard10/vcard10-phone.png')}}" alt="phone"/>
                        </span>
                                <div class="event-detail ms-sm-3 mt-sm-0 mt-4">
                                    <h6 class="event-title text-sm-start text-center">{{ __('messages.vcard.mobile_number') }}</h6>
                                    <h5><a href="tel:+{{ $vcard->region_code }}{{ $vcard->phone }}"
                                            class="event-name text-sm-start text-center mb-0 text-decoration-none">+{{ $vcard->region_code }}
                                            -{{ $vcard->phone }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($vcard->alternative_phone)
                        <div class="col-sm-6 col-12">
                            <div class="card event-card p-3 h-100 border-0 flex-sm-row flex-column align-items-center shadow">
                        <span class="event-icon d-flex justify-content-center align-items-center">
                            <img src="{{asset('assets/img/vcard10/old-typical-phone.png')}}" alt="phone"/>
                        </span>
                                <div class="event-detail ms-sm-3 mt-sm-0 mt-4">
                                    <h6 class="event-title text-sm-start text-center">{{ __('messages.vcard.alter_mobile_number') }}</h6>
                                    <h5>
                                        <a href="tel:+{{ $vcard->alternative_region_code }} {{ $vcard->alternative_phone }}"
                                            class="event-name text-sm-start text-center mb-0 text-decoration-none">+{{ $vcard->alternative_region_code }}
                                            -{{ $vcard->alternative_phone }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($vcard->dob)
                        <div class="col-sm-6 col-12">
                            <div class="card event-card p-3 h-100 border-0 flex-sm-row flex-column align-items-center shadow">
                                <span class="event-icon d-flex justify-content-center align-items-center">
                                    <img src="{{asset('assets/img/vcard10/vcard10-birthday.png')}}" alt="birthday"/>
                                </span>
                                <div class="event-detail ms-sm-3 mt-sm-0 mt-4">
                                    <h6 class="event-title text-sm-start text-center">{{ __('messages.vcard.dob') }}</h6>
                                    <h5 class="event-name text-sm-start text-center mb-0">{{ $vcard->dob }}</h5>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($vcard->location)
                        <div class="col-sm-6 col-12">
                            <div class="card event-card p-3 h-100 border-0 flex-sm-row flex-column align-items-center shadow">
                            <span class="event-icon d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/vcard10/vcard10-location.png')}}" alt="Address"/>
                            </span>
                                <div class="event-detail ms-sm-3 mt-sm-0 mt-4">
                                    <h6 class="event-title text-sm-start text-center">{{ __('messages.vcard.location') }}</h6>
                                    <h5 class="event-name text-sm-start text-center mb-0">{!! ucwords($vcard->location) !!}</h5>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($vcard->job_title)
                        <div class="col-sm-6 col-12">
                            <div class="card event-card p-3 h-100 border-0 flex-sm-row flex-column align-items-center shadow">
                            <span class="event-icon d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/vcard10/job_title.png')}}" alt="job"/>
                            </span>
                                <div class="event-detail ms-sm-3 mt-sm-0 mt-4">
                                    <h6 class="event-title text-sm-start text-center">{{ __('messages.vcard.job_title') }}</h6>
                                    <h5 class="event-name text-sm-start text-center mb-0" style="word-break: keep-all;">{!! ucwords($vcard->job_title) !!}</h5>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
	    {{--qr code--}}
	    <div class="vcard-ten__qr-code py-4 px-sm-3 px-2 position-relative mt-5">
		    <h4 class="vcard-ten-heading text-center mb-3">{{ __('messages.vcard.qr_code') }}</h4>
		    <div class="container">
			    <div
                    class="card qr-code-card justify-content-center align-items-center px-sm-3 px-4 pt-5 pb-5 position-relative w-100 mx-auto shadow">
				    <div class="mt-3 qr-code-scanner mx-md-4 mx-2 p-3 mt-5 mb-5 bg-white qr-code-image d-flex justify-content-around align-itmes-center">
					    {!! QrCode::size(130)->format('svg')->generate(Request::url()); !!}
                        <h4 class="d-flex align-items-center {{$vcard->qr_code_text == null ? 'd-none' : ''}}" style="width: 50%; overflow-wrap: anywhere; padding-left: 10px; padding-right: 10px; justify-content: center; text-align: center;">{{$vcard->qr_code_text}}</h4>
				    </div>
			    </div>
		    </div>
	    </div>
        {{--service--}}
        @if(checkFeature('services') && $vcard->services->count())
            <div class="vcard-ten__service py-4 px-sm-3 px-2 position-relative mb-10 mt-10">
                <h4 class="vcard-ten-heading text-center mb-10">{{ __('messages.vcard.our_service') }}</h4>
                <div class="container">
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
                                        <h5 class="card-title text-gray-100">{{ ucwords($service->name) }}</h5>
                                        <p class="card-text text-gray-300 {{ \Illuminate\Support\Str::length($service->description) > 80 ? 'more' : ''}}">{!! $service->description !!}</p>
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
            <div class="vcard-ten__gallery py-4 px-sm-3 px-2 position-relative mb-10 mt-0">
                <h4 class="vcard-ten-heading text-center mb-3">{{ $galleryName }}</h4>
            <div class="container">
                <div class="row g-3 gallery-slider mt-4">
                    @foreach($vcard->gallery as $file)
                        @php
                            $infoPath = pathinfo(public_path($file->gallery_image));
                          $extension = $infoPath['extension'];
                        @endphp
                    <div class="col-6 h-100">
                        <div class="card gallery-card p-4 border-0 w-100 position-relative shadow h-100">
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
            <div class="vcard-ten__product py-4 px-sm-3 px-2 position-relative mb-10 mt-0">
                <h4 class="vcard-ten-heading text-center mb-3">{{ __('messages.plan.products') }}</h4>
                <div class="container">
                    <div class="row g-3 product-slider mt-4">
                        @foreach($vcard->products as $product)
                            <div class="col-6  h-100">
                                <a @if($product->product_url) href="{{ $product->product_url }}" @endif
                                target="_blank" class="text-decoration-none fs-6">
                                    <div class="card product-card p-4 border-0 w-100 position-relative shadow h-100 card-height">
                                        <div class="product-profile">
                                            <img src="{{ $product->product_icon }}" alt="profile" class="w-100"
                                                 height="208px"/>
                                        </div>
                                        <div class="product-details mt-3">
                                            <h4 class="text-white">{{$product->name}}</h4>
                                            <p class="mb-2 text-white">
                                                {{$product->description}}
                                            </p>
                                            @if($product->currency_id && $product->price)
                                                <span
                                                        class="text-whitek">{{$product->currency->currency_icon}}{{$product->price}}</span>
                                            @elseif($product->price)
                                                <span class="text-white">{{$product->price}}</span>
                                            @else
                                                {{-- <span class="text-white">N/A</span> --}}
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
            <div class="vcard-ten__testimonial py-4 px-sm-3 px-2 position-relative mb-10 mt-0">
                <h4 class="vcard-ten-heading text-center mb-3">{{ __('messages.plan.testimonials') }}</h4>
                <div class="container">
                    <div class="row g-3 testimonial-slider mt-4">
                        @foreach($vcard->testimonials as $testimonial)
                            <div class="col-12 h-100">
                                <div class="card justify-content-between testimonial-card p-4 border-0 w-100 position-relative shadow h-100">
                                    <i class="fas fa-quote-left testimonial-quote"></i>
                                    <p class="review-message mb-3 text-sm-start text-center {{ \Illuminate\Support\Str::length($testimonial->description) > 80 ? 'more' : ''}}">
                                        {!! $testimonial->description !!}
                                    </p>
                                    <div class="testimonial-user mt-auto d-flex flex-sm-row flex-column align-items-center justify-content-sm-start justify-content-center">
                                        <img src="{{ $testimonial->image_url }}" alt="profile" class="rounded-circle"/>
                                        <div class="user-details d-flex flex-column ms-sm-3 mt-sm-0 mt-2">
                                            <span class="user-name text-sm-start text-center">{{ ucwords($testimonial->name) }}</span>
                                            <span class="user-designation text-sm-start text-center"></span>
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
            <div class="vcard-ten__blog py-4 px-sm-3 px-2 position-relative mb-5 mt-0">
                <h4 class="vcard-ten-heading text-center mb-3">{{ __('messages.feature.blog') }}</h4>
                <div class="container">
                    <div class="row g-4 blog-slider overflow-hidden mb-0">
                        @foreach($vcard->blogs as $blog)
                            <div class="col-6 mb-2">
                                <div class="card blog-card p-5 border-0 w-100 h-100 shadow">
                                    <div class="blog-image">
                                        <a href="{{route('vcard.show-blog',[$vcard->url_alias,$blog->id])}}">
                                            <img src="{{ $blog->blog_icon }}" alt="profile" class="w-100"/>
                                        </a>
                                    </div>
                                    <div class="blog-details mt-12">
                                        <a href="{{route('vcard.show-blog',[$vcard->url_alias,$blog->id])}}" class="text-decoration-none">
                                            <h4 class="text-sm-start text-center title-color p-3 text-black">{{ $blog->title }}</h4>
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
            <div class="vcard-ten__timing py-4 px-sm-3 px-2 position-relative mb-10 mt-0">
                <h4 class="vcard-ten-heading text-center mb-5">{{ __('messages.business.business_hours') }}</h4>
                <div class="row g-3 mx-sm-5">
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
        @endif

        {{--Appointment--}}
        @if(checkFeature('appointments') && $vcard->appointmentHours->count())
            <div class="vcard-ten__appointment py-3 px-sm-4 px-3 mt-2 position-relative mb-10 mt-0">
                <h4 class="vcard-ten-heading text-center mb-3">{{__('messages.make_appointments')}}</h4>
                <div class="container">
                    <div class="appointment-card p-3">
                        <div class="row d-flex align-items-center justify-content-center mb-3">
                            <div class="col-md-2">
                                <label for="date" class="appoint-date mb-2">{{__('messages.date')}}</label>
                            </div>
                            <div class="col-md-10">
                                {{ Form::text('date', null, ['class' => 'date appoint-input', 'placeholder' => __('messages.form.pick_date'),'id'=>'pickUpDate']) }}
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
                                class="appointmentAdd appoint-btn mt-4 d-block mx-auto ">{{__('messages.make_appointments')}}</button>
                    </div>
                </div>
        </div>
            @include('vcardTemplates.appointment')
        @endif


        {{--contact--}}
        @php $currentSubs = $vcard->subscriptions()->where('status', \App\Models\Subscription::ACTIVE)->latest()->first() @endphp
        <div class="vcard-ten__contact pt-4 px-sm-3 px-2 position-relative ">
            @if($currentSubs && $currentSubs->plan->planFeature->enquiry_form && $vcard->enable_enquiry_form)
                    <h4 class="vcard-ten-heading text-center mb-3">{{ __('messages.contact_us.contact_us') }}</h4>
                <div class="container mb-10 mt-0">
                    <div class="row mt-4">
                        <div class="col-12">
                            <form id="enquiryForm">
                                @csrf
                                    <div class="contact-form px-sm-5">
                                        <div id="enquiryError" class="alert alert-danger d-none"></div>
                                        <div class="mb-3">
                                            <input type="text" name="name" class="form-control" id="name"
                                                   placeholder="{{__('messages.form.your_name')}}">
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" name="email" class="form-control" id="email"
                                                   placeholder="{{__('messages.form.your_email')}}">
                                        </div>
                                        <div class="mb-3">
                                            <input type="tel" name="phone" class="form-control" id="phone"
                                                   placeholder="{{__('messages.form.phone')}}">
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" name="message"
                                                      placeholder="{{__('messages.form.type_message')}}" id="message"
                                                      rows="5"></textarea>
                                        </div>
                                        <button type="submit"
                                                class="contact-btn mt-4 d-block mx-auto">{{ __('messages.contact_us.send_message') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            <div class="container">
                <div class="d-flex  flex-column justify-content-center mt-5 mb-sm-5">
                    @if($vcard->location_url && isset($url[5]))
                        <div class="m-2 mb-10 mt-0">
                            <iframe width="100%" height="300px"
                                    src='https://maps.google.de/maps?q={{$url[5]}}/&output=embed' frameborder="0"
                                    scrolling="no" marginheight="0" marginwidth="0"
                                    style="border-radius: 10px;"></iframe>
                        </div>
                    @endif
                </div>
	            </div>
                <div class="d-flex justify-content-evenly">
                    @if(checkFeature('advanced'))
                        @if(checkFeature('advanced')->hide_branding && $vcard->branding == 0)
                            @if($vcard->made_by)
                                <a @if(!is_null($vcard->made_by_url)) href="{{$vcard->made_by_url}}" @endif
                                class="text-center text-decoration-none text-white" target="_blank">
                                    <small>Made by {{ $vcard->made_by }}</small>
                                </a>
                            @else
                                <div class="text-center">
                                    <small class="text-white">Made by {{ $setting['app_name'] }}</small>
                                </div>
                            @endif
                            @endif
                        @else
                            @if($vcard->made_by)
                                <a @if(!is_null($vcard->made_by_url)) href="{{$vcard->made_by_url}}" @endif
                                class="text-center text-decoration-none text-white" target="_blank">
                                    <small>Made by {{ $vcard->made_by }}</small>
                                </a>
                            @else
                                <div class="text-center">
                                    <small class="text-white">Made by {{ $setting['app_name'] }}</small>
                                </div>
                            @endif
                        @endif
                        @if(!empty($vcard->privacy_policy) || !empty($vcard->term_condition))
                            <div>
                                <a class="text-decoration-none text-white cursor-pointer terms-policies-btn" href="{{ route('vcard.show-privacy-policy',[$vcard->url_alias,$vcard->id]) }}"><small>{!! __('messages.vcard.term_policy') !!}</small></a>
                            </div>
                        @endif
                    </div>
	                <div class="w-100 d-flex justify-content-center sticky-vcard-div ">
		                <div class="btn-group vcard10-sticky-div" role="group" aria-label="Basic example" >
			                <button type="button" class="vcard-btn-group vcard10-sticky-btn rounded-0 px-2 ps-5 py-1" onclick="downloadVcard('{{ $vcard->name }}.vcf',{{ $vcard->id }})"><i class="fas fa-download fs-4"></i></button>
			                <button type="button" class="vcard10-share vcard-btn-group vcard10-sticky-btn rounded-0 px-2 py-1"><i class="fas fa-share-alt fs-4"></i></button>
			                @if(!empty($userSetting['enable_affiliation']))
				                <button type="button" class="vcard-btn-group vcard10-sticky-btn rounded-0 px-2 py-1 copy-referral-btn" data-id="{{ $vcard->user->affiliate_code }}"><i class="fa-regular fa-copy fs-4"></i></button>
			                @endif
			                @if($vcard->enable_download_qr_code)
			                <a type="button" class="vcard-btn-group vcard10-sticky-btn rounded-0 px-2 pe-5 py-2"  id="qr-code-btn" download="qr_code.png"><i class="fa-solid fa-qrcode fs-4"></i></a>
							@endif
		                </div>
	                </div>
            </div>

        {{-- share modal code--}}
        <div id="vcard10-shareModel" class="modal fade" role="dialog">
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
                                       target="_blank" class="mx-2 share10" title="Facebook">
                                        <i class="fab fa-facebook fa-2x" style="color: #1B95E0"></i>
                                    </a>
                                    <a href="http://twitter.com/share?url={{$shareUrl}}&text={{$vcard->name}}&hashtags=sharebuttons"
                                       target="_blank" class="mx-2 share10" title="Twitter">
                                        <i class="fab fa-twitter fa-2x" style="color: #1DA1F3"></i>
                                    </a>
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&url={{$shareUrl}}"
                                       target="_blank" class="mx-2 share10" title="Linkedin">
                                        <i class="fab fa-linkedin fa-2x" style="color: #1B95E0"></i>
                                    </a>
                                    <a href="mailto:?Subject=&Body={{$shareUrl}}" target="_blank"
                                       class="mx-2 share10" title="Email">
                                        <i class="fas fa-envelope fa-2x" style="color: #191a19  "></i>
                                    </a>
                                    <a href="http://pinterest.com/pin/create/link/?url={{$shareUrl}}"
                                       target="_blank" class="mx-2 share10" title="Pinterest">
                                        <i class="fab fa-pinterest fa-2x" style="color: #bd081c"></i>
                                    </a>
                                    <a href="http://reddit.com/submit?url={{$shareUrl}}&title={{$vcard->name}}"
                                       target="_blank" class="mx-2 share10" title="Reddit">
                                        <i class="fab fa-reddit fa-2x" style="color: #ff4500"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{$shareUrl}}" target="_blank" class="mx-2 share10" title="Whatsapp">
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
</div>
@include('vcardTemplates.template.templates')
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="{{ asset('assets/js/front-third-party.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>

@if(checkFeature('seo') && $vcard->google_analytics)
{!! $vcard->google_analytics !!}
@endif
<script>
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
$('.testimonial-slider').slick({
dots: true,
infinite: true,
arrows: true,
autoplay: true,
speed: 300,
slidesToShow: 1,
slidesToScroll: 1,
prevArrow: '<button class="slide-arrow prev-arrow"></button>',
nextArrow: '<button class="slide-arrow next-arrow"></button>',
});
</script>
<script>
$('.product-slider').slick({
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
    prevArrow: '<button class="slide-arrow-blog blog-prev-arrow"></button>',
    nextArrow: '<button class="slide-arrow-blog blog-next-arrow"></button>',
})
</script>
<script>
let isEdit = false
let password = "{{isset(checkFeature('advanced')->password) && !empty($vcard->password) }}"
let passwordUrl = "{{ route('vcard.password', $vcard->id) }}";
let enquiryUrl = "{{ route('enquiry.store', ['vcard' => $vcard->id, 'alias' => $vcard->url_alias]) }}";
let appointmentUrl = "{{ route('appointment.store', ['vcard' => $vcard->id, 'alias' => $vcard->url_alias]) }}";
let slotUrl = "{{route('appointment-session-time',$vcard->url_alias)}}";
let appUrl = "{{ config('app.url') }}";
let vcardId = {{$vcard->id}};
let vcardAlias = "{{$vcard->url_alias}}";
let languageChange = "{{ url('language') }}";
let paypalUrl = "{{ route('paypal.init') }}"
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
