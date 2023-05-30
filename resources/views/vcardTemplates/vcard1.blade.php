<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link>
    <!-- Required meta tags -->
    <meta charset="utf-8">
{{--    @if(checkFeature('seo'))--}}
{{--        @if($vcard->meta_description)--}}
{{--            <meta name="description" content="{{$vcard->meta_description}}">--}}
{{--        @endif--}}
{{--        @if($vcard->meta_keyword)--}}
{{--            <meta name="keywords" content="{{$vcard->meta_keyword}}">--}}
{{--        @endif--}}
{{--    @endif--}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(checkFeature('seo') && $vcard->site_title && $vcard->home_title)
        <title>{{ $vcard->home_title }} | {{ $vcard->site_title }}</title>
    @else
        <title>{{ $vcard->name }} | {{ getAppName() }}</title>
    @endif


    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--    @if (App::environment('production'))--}}
    {{--    @endif--}}
    <meta name="description" content="{{ $vcard->description }}">
    <meta name="keywords" content="">
    <meta property="og:image" content="{{$vcard->cover_url}}"/>




<!-- Favicon -->
	<link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">

	<link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ mix('assets/css/vcard1.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/custom-vcard.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">

	{{--google font--}}
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
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
    <div class="vcard-one main-content  w-100 mx-auto content-blur allSection collapse show">
        {{--        banner--}}
        <div class="vcard-one__banner w-100 position-relative">
            <img src="{{ $vcard->cover_url }}"
                 class="img-fluid" alt="background image"/>
            <div class="d-flex justify-content-end position-absolute top-0 end-0 me-3">
                @if($vcard->language_enable == \App\Models\Vcard::LANGUAGE_ENABLE)
                    <div class="language pt-5 me-4">
                        <ul class="text-decoration-none">
                            <li class="dropdown1 dropdown lang-list">
                                <a class="dropdown-toggle lang-head text-decoration-none" data-toggle="dropdown"
                                   role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-language me-2"></i>{{ getLanguage($vcard->default_language)}}
                                </a>
                                <ul class="dropdown-menu start-0 top-dropdown lang-hover-list top-100">
                                    @foreach(getAllLanguage() as $key => $language)
                                        <li class="{{ getLanguageIsoCode($vcard->default_language) == $key ? 'active' : '' }}">
                                            <a href="javascript:void(0)" id="languageName"
                                               data-name="{{ $key }}">
                                                @if(array_key_exists($key,\App\Models\User::FLAG))
                                                    @foreach(\App\Models\User::FLAG as $imageKey=> $imageValue)
                                                        @if($imageKey == $key)
                                                            <img src="{{asset($imageValue)}}" class="me-1"/>
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
        <div class="vcard-one__profile position-relative">
            <div class="avatar position-absolute top-0 start-50 translate-middle">
                <img src="{{ $vcard->profile_url }}"
                     alt="profile-img" class="rounded-circle"/>
            </div>
        </div>
        {{--profile details--}}
        <div class="vcard-one__profile-details py-3 d-flex flex-column align-items-center justify-content-center px-3">
            <h4 class="profile-name pt-2 mb-0">
                {{ ucwords($vcard->first_name.' '.$vcard->last_name) }}
            </h4>
            <span class="profile-designation pt-2 fw-light">{{ ucwords($vcard->occupation) }}</span>
            <span class="mt-4 profile-description" style="word-break: keep-all;">{!! $vcard->description !!}</span>
            @if(checkFeature('social_links') && isset($vcard->socialLink) && getSocialLink($vcard))
                <div class="social-icons d-flex flex-wrap justify-content-center  pt-4 w-100">
                    @foreach(getSocialLink($vcard) as $value)
                        {!! $value !!}
                    @endforeach
                </div>
            @endif
        </div>
        {{--event--}}
        <div class="vcard-one__event py-3 px-3">
            <div class="container" style="word-break: keep-all;">
                <div class="row g-3">
                    @if($vcard->email)
                        <div class="col-sm-6 col-12">
                            <div class="card event-card p-3 h-100 shadow-none  border-0">
                                 <span class="event-icon d-flex justify-content-center">
                                    <img src="{{asset('assets/img/vcard1/vcard1-email.png')}}" alt="email"/>
                                 </span>
                                <a href="mailto:{{ $vcard->email }}"
                                   class="event-name text-center pt-3 mb-0 text-decoration-none">{{ $vcard->email }}</a>
                            </div>
                        </div>
                    @endif
                        @if($vcard->alternative_email)
                            <div class="col-sm-6 col-12">
                                <div class="card event-card p-3 h-100 shadow-none  border-0">
                                 <span class="event-icon d-flex justify-content-center">
                                    <img src="{{asset('assets/img/vcard1/Vectors.png')}}" alt="email" height="31" width="40"/>
                                 </span>
                                    <a href="mailto:{{ $vcard->alternative_email }}"
                                       class="event-name text-center pt-3 mb-0 text-decoration-none">{{ $vcard->alternative_email }}</a>
                                </div>
                            </div>
                        @endif
                    @if($vcard->dob)
                        <div class="col-sm-6 col-12">
                            <div class="card event-card p-3 h-100 shadow-none border-0">
                             <span class="event-icon d-flex justify-content-center">
                                <img src="{{asset('assets/img/vcard1/vcard1-birthday.png')}}" alt="email"/>
                             </span>
                                <h6 class="event-name text-center pt-3 mb-0">{{$vcard->dob}}</h6>
                            </div>
                        </div>
                    @endif
                    @if($vcard->phone)
                        <div class="col-sm-6 col-12">
                            <div class="card event-card p-3 h-100 shadow-none border-0">
                            <span class="event-icon d-flex justify-content-center">
                            <img src="{{asset('assets/img/vcard1/vcard1-phone.png')}}" alt="email"/>
                            </span>
                                <a href="tel:+{{ $vcard->region_code }}{{ $vcard->phone }}"
                                    class="event-name text-center pt-3 mb-0 text-decoration-none">+ {{ $vcard->region_code }}
                                    -{{ $vcard->phone }}</a>
                            </div>
                        </div>
                    @endif
                    @if($vcard->alternative_phone)
                        <div class="col-sm-6 col-12">
                            <div class="card event-card p-3 h-100 shadow-none border-0">
                            <span class="event-icon d-flex justify-content-center">
                            <img src="{{asset('assets/img/vcard1/vcard1-alter-phone(4).png')}}" alt="email"/>
                            </span>
                                <a href="tel:+{{ $vcard->alternative_region_code }} {{ $vcard->alternative_phone }}"
                                    class="event-name text-center pt-3 mb-0 text-decoration-none">+{{ $vcard->alternative_region_code }}
                                    -{{ $vcard->alternative_phone }}</a>
                            </div>
                        </div>
                    @endif
                    @if($vcard->location)
                        <div class="col-sm-6 col-12">
                            <div class="card event-card p-3 h-100 shadow-none border-0">
                                <span class="event-icon d-flex justify-content-center">
                                    <img src="{{asset('assets/img/vcard1/vcard1-location.png')}}" alt="email"/>
                                </span>
                                <h6 class="event-name text-center pt-3 mb-0" style="word-break: keep-all;">{!! ucwords($vcard->location) !!}</h6>
                            </div>
                        </div>
                    @endif
                    @if($vcard->job_title)
                        <div class="col-sm-6 col-12">
                            <div class="card event-card p-3 h-100 shadow-none border-0">
                                <span class="event-icon d-flex justify-content-center">
                                    <img src="{{asset('assets/img/vcard1/job_title.png')}}" alt="job" style="width: 40px;"/>
                                </span>
                                <h6 class="event-name text-center pt-3 mb-0">{!! ucwords($vcard->job_title) !!}</h6>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
	    {{--Qr code--}}
	    <div class="vcard-one__qr-code my-3 py-5 px-3">
		    <h4 class="vcard-one-heading text-center pb-4">{{ __('messages.vcard.qr_code') }}</h4>
		    <div class="qr-code p-3 card d-block mx-auto border-0">
			    <div class="qr-code-image d-flex justify-content-around align-itmes-center">
				    {!! QrCode::size(130)->format('svg')->generate(Request::url()); !!}
                    {{-- here is vector --}}
                     <h4 class="d-flex align-items-center {{$vcard->qr_code_text == null ? 'd-none' : ''}}" style="width: 50%; overflow-wrap: anywhere; padding-left: 10px; padding-right: 10px; justify-content: center; text-align: center;">{{$vcard->qr_code_text}}</h4>
			    </div>
		    </div>
	    </div>
        {{--our services--}}
        @if(checkFeature('services') && $vcard->services->count())
            <div class="vcard-one__service my-3 py-5 mb-10 mt-0">
                <h4 class="vcard-one-heading text-center pb-4">{{ __('messages.vcard.our_service') }}</h4>
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
            <div class="vcard-one__gallery py-3 mb-10 mt-0">
                <h4 class="vcard-one-heading text-center pb-4">{{ $galleryName }}</h4>
                <div class="container">
                    <div class="row g-4 gallery-slider overflow-hidden">
                        @foreach($vcard->gallery as $file)
                            @php
                                $infoPath = pathinfo(public_path($file->gallery_image));
                              $extension = $infoPath['extension'];
                              @endphp
                            <div class="col-sm-6 col-12 mb-2 h-100">
                                <div class="card gallery-card m-auto p-2 border-0 w-100 h-100 gallery-vcard-block">
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
{{--                    &#8592;--}}
{{--                    <p class="slick-prev">&#8592;</p>--}}
{{--                --}}
{{--                    <span class="slick-next">&#8594;fsddsfsdfsd</span>--}}
                </div>
            </div>
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
        {{--Product slider--}}
        @if(checkFeature('products') && $vcard->products->count())
            <div class="vcard-one__product py-3 mb-10 mt-0">
                <h4 class="vcard-one-heading text-center pb-4">{{ __('messages.vcard.products') }}</h4>
                <div class="container">
                    <div class="row g-4 product-slider overflow-hidden">
                        @foreach($vcard->products as $product)
                            <div class="col-6 mb-2">
                                <a @if($product->product_url) href="{{ $product->product_url }}" @endif
                                target="_blank" class="text-decoration-none fs-6">
                                    <div class="card product-card p-2 border-0 w-100 h-100">
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
            <div class="vcard-one__testimonial py-3 mb-10 mt-0">
                <h4 class="vcard-one-heading text-center pb-4">{{ __('messages.plan.testimonials') }}</h4>
                <div class="container">
                    <div class="row g-4 pt-5 testimonial-slider overflow-hidden">
                        @foreach($vcard->testimonials as $testimonial)
                            <div class="col-6 testimonial-margin">
                                <div class="card testimonial-card position-relative p-3 border-0 w-100 product-block testimonial-margin">
                                    <div class="testimonial-profile position-absolute top-0 start-50 translate-middle">
                                        <img src="{{ $testimonial->image_url }}" alt="profile"
                                             class="rounded-circle m-auto">
                                    </div>
                                    <div class="testimonial-details mt-5">
                                        <h4 class="text-center">{{ ucwords($testimonial->name) }}</h4>
                                        <p class="text-center text-muted {{ \Illuminate\Support\Str::length($testimonial->description) > 80 ? 'more' : ''}}">{!! $testimonial->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @endif
                {{-- blog--}}
                @if(checkFeature('blog') && $vcard->blogs->count())
                    <div class="vcard-one__blog my-3 py-5 mt-0">
                        <h4 class="vcard-one-heading text-center pb-4">{{ __('messages.feature.blog') }}</h4>
                        <div class="container">
                            <div class="row g-3 mb-0 justify-content-center blog-slider overflow-hidden">
                                @foreach($vcard->blogs as $blog)
                            <div class="col-6 mb-2">
                                <div class="card blog-card p-sm-2 p-4 border-0 w-100 h-100 flex-sm-row flex-column">
                                    <div class="blog-image">
                                        <a href="{{route('vcard.show-blog',[$vcard->url_alias,$blog->id])}}">
                                            <img src="{{ $blog->blog_icon }}" alt="profile"/>
                                        </a>
                                    </div>
                                    <div class="blog-details mt-3">
                                        <a href="{{route('vcard.show-blog',[$vcard->url_alias,$blog->id])}}" class="text-decoration-none">
                                            <h4 class="text-start text-black p-sm-3 pt-2 mb-0">{{ $blog->title }}</h4>
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
                    <div class="vcard-one__timing py-3 px-1 mb-10 mt-0">
                        <h4 class="vcard-one-heading text-center pb-4">{{ __('messages.business.business_hours') }}</h4>
                <div class="container pb-4">
                    <div class="row g-3">
                        @foreach($businessDaysTime as $key => $dayTime)
                            <div class="col-12">
                                <div class="card business-card flex-row p-3
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
                    <div class="vcard-one__appointment py-3 mb-10 mt-0">
                        <h4 class="vcard-one-heading text-center pb-4">{{__('messages.make_appointments')}}</h4>
                <div class="container px-4">
                    <div class="appointment-one">
                        <div class="row d-flex align-items-center justify-content-center mb-3">
                            <div class="col-md-2">
                                <label for="date" class="appoint-date mb-2">{{__('messages.date')}}</label>
                            </div>
                            <div class="col-md-10">
                                {{ Form::text('date', null, ['class' => 'date appoint-input mb-2 form-control', 'placeholder' => __('messages.form.pick_date'),'id'=>'pickUpDate']) }}
                            </div>
                        </div>
                        <div class="row d-flex align-items-center justify-content-center mb-md-3">
                            <div class="col-md-2">
                                <label for="hour" class="appoint-date mb-2 text-left">{{__('messages.hour')}}</label>
                            </div>
                            <div class="col-md-10">
                                <div id="slotData" class="row">
                                </div>
                            </div>
                        </div>
                        <button type="button"
                                class="appointmentAdd appoint-btn text-white mt-4 d-block mx-auto ">{{__('messages.make_appointments')}}
                        </button>
                        @include('vcardTemplates.appointment')
                    </div>
                </div>
            </div>
        @endif
        @php $currentSubs = $vcard->subscriptions()->where('status', \App\Models\Subscription::ACTIVE)->latest()->first() @endphp
        @if($currentSubs && $currentSubs->plan->planFeature->enquiry_form && $vcard->enable_enquiry_form)
                    <div class="vcard-one__contact py-5 mb-0 mt-0">
                        <h4 class="vcard-one-heading text-center pb-4">{{ __('messages.contact_us.contact_us') }}</h4>
                <form id="enquiryForm">
                    @csrf
                    <div class="contact-form px-3">
                        <div id="enquiryError" class="alert alert-danger d-none"></div>
                        <div class="mb-3">
                            <label class="form-label">
                                {{ __('messages.common.name') }}<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text border-end-0"><i class="far fa-user"></i></span>
                                <input type="text" name="name" class="form-control border-start-0"
                                       placeholder="{{__('messages.form.your_name')}}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                {{ __('messages.user.email') }}<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text border-end-0"><i class="far fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control border-start-0"
                                       placeholder="{{__('messages.form.your_email')}}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('messages.user.phone') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text border-end-0"><i class="fas fa-phone"></i></span>
                                <input type="tel" name="phone" class="form-control border-start-0"
                                       placeholder="{{__('messages.form.phone')}}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                {{ __('messages.contact_us.message') }}<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="message"
                                      placeholder="{{__('messages.form.type_message')}}"
                                      id="message"
                                      rows="5"></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit"
                                    class="contact-btn text-white mt-4 d-block ms-sm-auto">{{ __('messages.contact_us.send_message') }}</button>
                        </div>
                    </div>
                </form>
            </div>
                @endif
            </div>
                @if($vcard->location_url && isset($url[5]))
                <div class="m-2 mb-10 mt-0">
                    <iframe width="100%" height="300px"
                            src='https://maps.google.de/maps?q={{$url[5]}}/&output=embed'
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                style="border-radius: 10px;"></iframe>
            </div>
        @endif
            <div class="d-flex justify-content-evenly mt-5">
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
                    <a class="text-decoration-none text-dark cursor-pointer"
                       href="{{ route('vcard.show-privacy-policy',[$vcard->url_alias,$vcard->id]) }}">
                        <small>{!! __('messages.vcard.term_policy') !!}</small></a>
                </div>
            @endif
        </div>
		    <div class="w-100 d-flex justify-content-center sticky-vcard-div">
			    <div class="btn-group" role="group" aria-label="Basic example" >
				    <button type="button" class="vcard-btn-group vcard1-sticky-btn rounded-0 px-2 ps-5 py-1" onclick="downloadVcard('{{ $vcard->name }}.vcf',{{ $vcard->id }})"><i class="fas fa-download fs-4"></i></button>
				    <button type="button" class="vcard1-share share-btn vcard-btn-group vcard1-sticky-btn rounded-0 px-2 py-1"><i class="fas fa-share-alt fs-4"></i></button>
				    @if(!empty($userSetting['enable_affiliation']))
				    <button type="button" class="vcard-btn-group vcard1-sticky-btn rounded-0 px-2 py-1 copy-referral-btn" data-id="{{ $vcard->user->affiliate_code }}"><i class="fa-regular fa-copy fs-4"></i></button>
				    @endif
				    @if($vcard->enable_download_qr_code)
				    <a type="button" class="text-white vcard-btn-group vcard1-sticky-btn rounded-0 px-2 pe-5 py-2" id="qr-code-btn" download="qr_code.png"><i class="fa-solid fa-qrcode fs-4"></i></a>
					@endif	
			    </div>
		    </div>
            </div>





   {{-- share modal code--}}
   <div id="vcard1-shareModel" class="modal fade" role="dialog">
       <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">{{ __('messages.vcard.share_my_vcard') }}</h5>
                   <button type="button" aria-label="Close"
                           class="btn btn-sm btn-icon btn-active-color-danger border-none"
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
                              target="_blank" class="mx-2 share" title="Facebook">
                               <i class="fab fa-facebook fa-2x" style="color: #1B95E0"></i>
                           </a>
                           <a href="http://twitter.com/share?url={{$shareUrl}}&text={{$vcard->name}}&hashtags=sharebuttons"
                              target="_blank" class="mx-2 share" title="Twitter">
                               <i class="fab fa-twitter fa-2x" style="color: #1DA1F3"></i>
                           </a>
                           <a href="http://www.linkedin.com/shareArticle?mini=true&url={{$shareUrl}}"
                              target="_blank" class="mx-2 share" title="Linkedin">
                               <i class="fab fa-linkedin fa-2x" style="color: #1B95E0"></i>
                           </a>
                           <a href="mailto:?Subject=&Body={{$shareUrl}}" target="_blank"
                              class="mx-2 share" title="Email">
                               <i class="fas fa-envelope fa-2x" style="color: #191a19  "></i>
                           </a>
                           <a href="http://pinterest.com/pin/create/link/?url={{$shareUrl}}"
                              target="_blank" class="mx-2 share" title="Pinterest">
                               <i class="fab fa-pinterest fa-2x" style="color: #bd081c"></i>
                           </a>
                           <a href="http://reddit.com/submit?url={{$shareUrl}}&title={{$vcard->name}}"
                              target="_blank" class="mx-2 share" title="Reddit">
                               <i class="fab fa-reddit fa-2x" style="color: #ff4500"></i>
                           </a>
                           <a href="https://wa.me/?text={{$shareUrl}}" target="_blank" class="mx-2 share"
                              title="Whatsapp">
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
   @include('vcardTemplates.template.templates')
</div>
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
   $setting = \App\Models\UserSetting::where('user_id', $vcard->tenant->user->id)->where('key', 'stripe_key')->first()
@endphp
<script>
   let stripe = '';
   @if (!empty($setting) && !empty($setting->value))
       stripe = Stripe('{{ $setting->value }}');
   @endif
   $('.testimonial-slider').slick({
       dots: true,
       infinite: true,
       speed: 300,
       slidesToShow: 2,
       autoplay: false,
       slidesToScroll: 1,
       arrows: true,
       prevArrow: '<button class="slide-arrow-testimonial prev-arrow"></button>',
       nextArrow: '<button class="slide-arrow-testimonial  next-arrow"></button>',
       adaptiveHeight: true,
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
   $('.product-slider').slick({
       dots: true,
       infinite: true,
       speed: 300,
       slidesToShow: 2,
       autoplay: true,
       slidesToScroll: 1,
       arrows: true,
       prevArrow: '<button class="product-slide-arrow prev-arrow"></button>',
       nextArrow: '<button class="product-slide-arrow next-arrow"></button>',
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
       speed: 300,
       slidesToShow: 2,
       autoplay: true,
       slidesToScroll: 1,
       arrows: true,
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

   $('.blog-slider').slick({
       dots: true,
       infinite: true,
       speed: 300,
       slidesToShow: 1,
       autoplay: true,
       slidesToScroll: 1,
       arrows: true,
       prevArrow: '<button class="slide-arrow prev-arrow"></button>',
       nextArrow: '<button class="slide-arrow next-arrow"></button>',
   });
</script>
<script>
   let isEdit = false;
   let password = "{{isset(checkFeature('advanced')->password) && !empty($vcard->password) }}";
   let passwordUrl = "{{ route('vcard.password', $vcard->id) }}";
   let enquiryUrl = "{{ route('enquiry.store', ['vcard' => $vcard->id, 'alias' => $vcard->url_alias]) }}";
   let appointmentUrl = "{{ route('appointment.store', ['vcard' => $vcard->id, 'alias' => $vcard->url_alias]) }}";
   let paypalUrl = "{{ route('paypal.init') }}";
   let slotUrl = "{{route('appointment-session-time',$vcard->url_alias)}}";
   let appUrl = "{{ config('app.url') }}";
   let vcardId = {{$vcard->id}};
   let vcardAlias = "{{$vcard->url_alias}}";
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
