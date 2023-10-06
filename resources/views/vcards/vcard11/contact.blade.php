@extends('vcards.vcard11.app')
@section('title')
    Contact
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/contact.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('page_name')
    Contact
@endsection
@section('content')
    <div class="tab-content p-sm-4 p-3" id="v-pills-tabContent">
        <div class="contact-tab tab-pane fade show active" id="v-pills-contact" role="tabpanel"
             aria-labelledby="v-pills-contact-tab">
            <!-- start contact-info section -->
            <section class="contact-info-section mt-3">
                <div class="section-heading mb-40">
                    <h2 class="fs-22 text-white ps-4">{{__('messages.vcard_11.contact_detail')}}</h2>
                </div>
                <div class="row">
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
                                {{--                                <p class="card-text fs-14 pb-3 mb-0 text-white">Lorem ipsum dolor sit amet, consectetur--}}
                                {{--                                    adipiscing elit.</p>--}}
                                <a href="#!" class="fs-14">YOURMAIL@DOMAIN.COM</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-sm-5 mb-4">
                        <div class="card flex-row p-sm-4 p-3 h-100">
                            <div class="tag d-flex justify-content-center align-items-center">
                                <span class="fs-6 text-white">02</span>
                            </div>
                            <div class="card-img-top d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="card-body p-0 ps-4">
                                <h5 class="card-title fs-18">{{__('messages.vcard_11.my_phones')}}</h5>
                                {{--                                <p class="card-text fs-14 pb-3 mb-0 text-white">Lorem ipsum dolor sit amet, consectetur--}}
                                {{--                                    adipiscing elit.</p>--}}
                                <a href="#!" class="fs-14">+7(111)123456789</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end contact-info section -->
            <div class="row">
                <div class="col-md-6">
                    <!-- start make an appointment-section  -->
                    <section class="make-appointment-section mb-sm-5 mb-4">
                        <div class="section-heading mb-40">
                            <h2 class="fs-22 text-white ps-4">{{__('messages.make_appointment')}}</h2>
                        </div>
                        <form>
                            <div class="form-group d-flex mb-4">
                                <label for="start" class="fs-14 text-white me-4">Date:</label>
                                <input type="date" id="start" class="w-100 fs-14 form-control text-white"
                                       name="trip-start" value="2022-10-11" min="2022-10-11" max="2023-12-31">
                            </div>
                            <div class="form-group d-flex">
                                <label for="start" class="fs-14 text-white me-4">Hour:</label>
                                <div class="row w-100">
                                    <div class="col-6 mb-4">
                                        <input type="time" class="form-control w-100 text-white fs-14"
                                               id="exampleFormControlInput1" value="08:10-20:00">
                                    </div>
                                    <div class="col-6 mb-4">
                                        <input type="time" class="form-control w-100 text-white fs-14"
                                               id="exampleFormControlInput1" value="08:10-20:00">
                                    </div>
                                    <div class="col-6">
                                        <input type="time" class="form-control  w-100 text-white fs-14"
                                               id="exampleFormControlInput1" value="08:10-20:00">
                                    </div>
                                    <div class="col-6">
                                        <input type="time" class="form-control  w-100 text-white fs-14"
                                               id="exampleFormControlInput1" value="08:10-20:00">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center mt-4">
                                    <button class="btn btn-primary fs-14">Make An Appointment</button>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- end make an appointment-section  -->

                </div>
                <div class="col-md-6">
                    <!-- start bussiness hours-section -->
                    <section class="bussinesss-hours-section mb-4">
                        <div class="section-heading mb-40">
                            <h2 class="fs-22 text-white ps-4">Business Hours</h2>
                        </div>
                        <div class="hours px-4 py-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fs-14 text-white">Sun :</span>
                                <span class="fs-14 text-white">08:10-20:00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fs-14 text-white">Mon :</span>
                                <span class="fs-14 text-white">08:10-20:00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fs-14 text-white">Tue :</span>
                                <span class="fs-14 text-white">08:10-20:00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fs-14 text-white">Wed :</span>
                                <span class="fs-14 text-white">08:10-20:00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fs-14 text-white">Thu :</span>
                                <span class="fs-14 text-white">08:10-20:00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fs-14 text-white">Fri :</span>
                                <span class="fs-14 text-white">08:10-20:00</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="fs-14 text-white">Sat :</span>
                                <span class="fs-14 text-white">08:10-20:00</span>
                            </div>
                        </div>
                    </section>
                    <!-- end bussiness hours-section -->
                </div>
            </div>

            <section class="contact-section mb-sm-5 mb-4">
                <div class="section-heading mb-40">
                    <h2 class="fs-22 text-white ps-4">Enquiries</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-md-0 mb-4">
                        <div id="map" class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d59501.24210334308!2d72.84432463781383!3d21.238682688728503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3be04f48b6c140a3%3A0x6aae5a9a1643f6f!2sInfyOm%20Technologies%2C%20C%2F303%2C%20Atlanta%20Shopping%20Mall%20Sudama%20Chowk%2C%20Mota%20Varachha%2C%20Surat%2C%20Gujarat!3m2!1d21.2386063!2d72.8793441!4m5!1s0x3be04f48b6c140a3%3A0x6aae5a9a1643f6f!2sinfyom%20technologies!3m2!1d21.2386063!2d72.8793441!5e0!3m2!1sen!2sin!4v1662023367097!5m2!1sen!2sin"
                                    class="w-100 h-100 object-fit-cover rounded-10 border-0" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="form-group mb-4">
                                <div class="input-icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <input type="name" class="form-control fs-12 text-white" id="exampleFormControlInput1"
                                       placeholder="Your Name *" required/>
                            </div>
                            <div class="form-group mb-4">
                                <div class="input-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <input type="email" class="form-control fs-12 text-white" id="exampleFormControlInput1"
                                       placeholder="Email Address*" required/>
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
                                <textarea name="comments" id="comments"
                                          class="text-area form-control fs-12 text-white h-auto" rows="5"
                                          placeholder="Your Message:"></textarea>
                            </div>
                            <button class="btn btn-primary fs-14">Send Message</button>
                        </form>
                    </div>
                </div>
            </section>

            <!-- start QR-code section -->
            <section class="qr-code-section">
                <div class="section-heading mb-40">
                    <h2 class="fs-22 text-white ps-4">QR code</h2>
                </div>
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="image-box me-sm-5">
                        <div class="image mb-4 text-center">
                            <img src="{{ asset('assets/img/vcard11/hero-content.jpeg') }}"
                                 class="w-100 h-100 object-fit-cover">
                        </div>
                        <div class="row mb-sm-0 mb-4">
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-auto">Download My QR Code</button>
                            </div>
                        </div>
                    </div>
                    <div class="qr-code">
                        <a href="#!"><i
                                    class="fa-sharp fa-solid fa-qrcode d-flex justify-content-center align-items-center"></i></a>
                    </div>
                </div>
            </section>
        </div>
        <!-- end QR-code section -->
    </div>
@endsection
