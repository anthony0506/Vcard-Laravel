@extends('vcardTemplates.vcard11.app')
@section('title')
{{__('auth.contact')}}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/contact.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('page_name')
    {{__('auth.contact')}}
@endsection
@section('content')
    <div class="tab-content p-sm-4 p-3" id="v-pills-tabContent">
        <div class="contact-tab tab-pane fade show active" id="v-pills-contact" role="tabpanel"
             aria-labelledby="v-pills-contact-tab">
            <!-- start contact-info section -->
            @if($vcard->email || $vcard->phone ||$vcard->alternative_email ||$vcard->alternative_phone )
                <section class="contact-info-section mt-3">
                    <div class="section-heading mb-40">
                        <h2 class="fs-22 text-white ps-4">{{__('messages.vcard_11.contact_detail')}}</h2>
                    </div>
                    <div class="row">
                        @if($vcard->email)
                            <div class="col-md-6 mb-sm-5 mb-4">
                                <div class="card flex-row p-sm-4 p-3 h-100">
                                    <div class="tag d-flex justify-content-center align-items-center">
                                        <span class="fs-6 text-white">01</span>
                                    </div>
                                    <div class="card-img-top d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div class="card-body p-0 ps-4">
                                        <h5 class="card-title fs-18">{{__('messages.vcard_11.my_email')}}</h5>
                                        {{--                                        <p class="card-text fs-14 pb-3 mb-0 text-white">Lorem ipsum dolor sit amet,--}}
                                        {{--                                            consectetur--}}
                                        {{--                                            adipiscing elit.</p>--}}
                                        <a href="mailto:{{ $vcard->email }}"
                                           class="fs-14 text-break">{{ strtoupper($vcard->email) }}</a> <br>
                                        @if($vcard->alternative_email)
                                            <a href="mailto:{{ $vcard->alternative_email }}"
                                               class="fs-14 text-break">{{ strtoupper($vcard->alternative_email) }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($vcard->phone || $vcard->alternative_phone)
                            <div class="col-md-6 mb-sm-5 mb-4">
                                <div class="card flex-row p-sm-4 p-3 h-100">
                                    <div class="tag d-flex justify-content-center align-items-center">
                                        <span class="fs-6 text-white">{{ $vcard->phone == null ? '01' : '02'}}</span>
                                    </div>
                                    <div class="card-img-top d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="card-body p-0 ps-4">
                                        <h5 class="card-title fs-18">{{__('messages.vcard_11.my_phones')}}</h5>
                                        {{--                                        <p class="card-text fs-14 pb-3 mb-0 text-white">Lorem ipsum dolor sit amet,--}}
                                        {{--                                            consectetur--}}
                                        {{--                                            adipiscing elit.</p>--}}
                                        @if($vcard->phone)
                                            <a href="tel:+{{ $vcard->region_code }}{{ $vcard->phone }}"
                                               class="fs-14">+ {{ $vcard->region_code }}-{{ $vcard->phone }}</a><br>
                                        @endif
                                        @if($vcard->alternative_phone)
                                            <a href="tel:+{{ $vcard->alternative_region_code }}{{ $vcard->alternative_phone }}"
                                               class="fs-14">+ {{ $vcard->alternative_region_code }}
                                                -{{ $vcard->alternative_phone }}</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </section>
            @endif
        <!-- end contact-info section -->
            <div class="row">
                @if(checkFeature('appointments') && $vcard->appointmentHours->count())
                    <div class="col-md-6">
                        <!-- start make an appointment-section  -->

                        {{--Appointment--}}
                        <section class="make-appointment-section mb-sm-5 mb-4">
                            <div class="section-heading mb-40">
                                <h2 class="fs-22 text-white ps-4">{{__('messages.make_appointment')}}</h2>
                            </div>
                            <form>
                                <div class="form-group d-flex mb-4">
                                    <label for="start" class="fs-14 text-white me-4">{{__('messages.date')}}:</label>
                                    <input id="pickUpDate"
                                           class="w-100 fs-14 form-control text-white appoint-input flatpickr-input date"
                                           name="date" type="text" placeholder="{{__('messages.form.pick_date')}}"
                                           style="text-align: center;border-radius: 12px;margin-top:-10px">
                                </div>
                                <div class="form-group d-flex">
                                    <label for="start" class="fs-14 text-white me-4">{{__('messages.hour')}}:</label>
                                    <div class="row w-100">
                                        <div id="slotData" class="row">
                                        </div>
                                        <input type="hidden" id="templateId">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center mt-4">
                                        <button type="button" class="btn btn-primary appointmentAdd appoint-btn  fs-14">
                                            {{__('messages.make_appointment')}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @include('vcardTemplates.vcard11.appointment')
                        </section>

                        <!-- end make an appointment-section  -->

                    </div>
                @endif
                <div class="col-md-6">
                    <!-- start bussiness hours-section -->
                    @if($vcard->businessHours->count())
                        <section class="bussinesss-hours-section mb-4">
                            <div class="section-heading mb-40">
                                <h2 class="fs-22 text-white ps-4">{{__('messages.business.business_hours')}}</h2>
                            </div>
                            <div class="hours px-4 py-3">
                                @foreach($vcard->businessHours as $day)
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="fs-14 text-white">{{ strtoupper(__('messages.business.'.\App\Models\BusinessHour::DAY_OF_WEEK[$day->day_of_week])).' :' }}</span>
                                        <span class="fs-14 text-white">{{ $day->start_time.' - '.$day->end_time }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                        <!-- end bussiness hours-section -->
                    @endif
                </div>
            </div>


            @php $currentSubs = $vcard->subscriptions()->where('status', \App\Models\Subscription::ACTIVE)->latest()->first() @endphp
            @if($currentSubs && $currentSubs->plan->planFeature->enquiry_form && $vcard->enable_enquiry_form)
                <section class="contact-section mb-sm-5 mb-4">
                    <div class="section-heading mb-40">
                        <h2 class="fs-22 text-white ps-4">{{__('messages.enquiry')}}</h2>
                    </div>
                    <div class="row">
                        @if($vcard->location_url && isset($url[5]))
                            <div class="col-md-6 mb-md-0 mb-4">
                                <div id="map" class="map">
                                    <iframe src='https://maps.google.de/maps?q={{$url[5]}}/&output=embed'
                                            class="w-100 h-100 object-fit-cover rounded-10 border-0" allowfullscreen=""
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                            style="border-radius: 10px;"></iframe>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-6 col-12">
                            <form id="enquiryForm">
                                @csrf
                                <div id="enquiryError" class="alert alert-danger d-none"></div>
                                <div class="form-group mb-4">
                                    <div class="input-icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <input type="name" class="form-control fs-12 text-white" id="name"
                                           placeholder="Your Name *" required name="name"/>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <input type="email" class="form-control fs-12 text-white" id="email"
                                           placeholder="Email Address*" required name="email"/>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="input-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <input type="text" class="form-control fs-12 text-white" id="phone"
                                           placeholder="Enter Phone" name="phone"/>
                                </div>
                                <div class="form-group mb-4 text-area">
                                    <div class="input-icon">
                                        <i class="fas fa-message"></i>
                                    </div>
                                    <textarea name="message" id="message"
                                              class="text-area form-control fs-12 text-white h-auto" rows="5"
                                              placeholder="Your Message*"></textarea>
                                </div>
                                <button type="submit"
                                        class="contact-btn btn btn-primary fs-14">{{__('messages.contact_us.send_message')}}</button>
                            </form>
                        </div>
                    </div>
                </section>
        @endif
        <!-- start QR-code section -->
            <section class="qr-code-section">
                <div class="section-heading mb-40">
                    <h2 class="fs-22 text-white ps-4">{{__('messages.vcard.qr_code')}}</h2>
                </div>
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="image-box me-sm-5">
	                    @if($vcard->enable_download_qr_code)
		                    <div class="row mb-sm-0 mb-4">
	                            <div class="col-12 text-center">
	                                <a class="btn btn-primary w-auto qr-code-btn" id="qr-code-btn"
	                                   download="qr_code.png">{{ __('messages.vcard.download_my_qr_code') }}</a>
	                            </div>
	                        </div>
						@endif
                    </div>
                    <div class="qr-code qr-code-image">
                        <a>{!! QrCode::size(200)->format('svg')->generate(\Illuminate\Support\Facades\URL::to($vcard->url_alias)); !!}</a>
                    </div>
                </div>
            </section>
        </div>
        <!-- end QR-code section -->
    </div>
@endsection
