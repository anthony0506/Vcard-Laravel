@extends('front.layouts.app')
@section('title')
    {{ getAppName() }}
@endsection
@section('content')
    <section class="bg-image"
        style="background-image: url({{ asset('front/images/contact-image.png') }}); background-size: cover">
        <div class="py-5">
            <div class="py-5 text-center container-md w-50">
                <h1 class="text-primary display-2 fw-bold">About Us</h1>
                <p class="mb-4 border-none bg-primary badge text-dark fs-4 rounded-0">Your trusted business card solution</p>
                <p class="text-secondary lead">
                    Make your vcard now with or without the NueLynx Card. Share Your Business Information with your
                    prospects directly via SMS, Email or any other ways.
                </p>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="row ">
                <div class="mb-4 col-md-4">
                    <div class="p-2 shadow-sm card rounded-1" style="margin-top: -20%">
                        <div class="card-body">
                            <h5 class="fs-2 text-primary card-title">We Are</h5>
                            <p class="card-text">NueLynx, a company that offers customizable business cards and digital
                                profiles to help elevate your networking game. Whether you opt for our metal cards or just
                                the digital profile, we provide the tools to easily share your business information with
                                potential clients via SMS, email, or social media.</p>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-md-4">
                    <div class="p-2 shadow-sm card rounded-1" style="margin-top: -20%">
                        <div class="card-body">
                            <h5 class="fs-2 text-primary card-title">Our Mission</h5>
                            <p class="card-text">We mpower professionals to make lasting impressions through innovative and
                                sustainable business solutions. We believe that our metal cards and digital profiles offer a
                                unique and memorable way to showcase your brand while also making a positive impact on the
                                environment with our sustainable card options.</p>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-md-4">
                    <div class="p-2 shadow-sm card rounded-1" style="margin-top: -20%">
                        <div class="card-body">
                            <h5 class="fs-2 text-primary card-title">Our Value</h5>
                            <p class="card-text">we value sustainability, innovation, and connection. Our sustainable
                                business cards are made from recycled metal and non-toxic inks, and can be recycled at the
                                end of their useful life. We are constantly innovating to bring you the latest and greatest
                                in networking solutions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- start about section -->
    <section class="" id="frontAboutTab">
        <div class="px-0 mx-0 container-fluid">
            <h2 class="mb-4 text-center display-6 ">
                Why Us?
            </h2>
            <div class="px-0 mx-0 my-2 row">
                <div class='col d-flex'
                    style="background-image:url({{ asset('front/images/card1.png') }}); background-position: 'center center'; background-size:'contain'">
                </div>
                <div class="text-white col-md-6 d-flex bg-dark">
                    <div class="p-5">
                        <h1 class="display-4 fw-bold">Leave a lasting impression</h1>
                        <p class="mt-4 fw-light">Elevate Your Business Image with Customizable Laser-Engraved
                            Business
                            Cards from NueLynx. Personalize your card with logo and contact details, showcasing your
                            brand and make an impact.</p>
                    </div>
                </div>
            </div>

            <div class="px-0 mx-0 my-2 row">

                <div class="text-white col-md-6 d-flex" style="background: #1b503b">
                    <div class="p-5">
                        <h1 class="display-4 fw-bold">Choose
                            Sustainability</h1>
                        <p class="mt-4 fw-light">Make a Positive Impact on the Environment with our eco-friendly business
                            cards! Crafted from recycled metal and printed with non-toxic inks, our cards are fully
                            recyclable. Showcasing your brand and commitment to sustainability has never been easier.</p>
                    </div>
                </div>
                <div class='col d-flex'
                    style="background-image:url({{ asset('front/images/card2.png') }}); background-position: 'center center'; background-size:'contain'">


                </div>
            </div>

            <div class="px-0 mx-0 my-2 row">
                <div class='col d-flex'
                    style="background-image:url({{ asset('front/images/card3.png') }}); background-position: 'center'; background-size:'cover'">
                </div>

                <div class="text-white col-md-6 d-flex bg-dark">
                    <div class="p-5">
                        <h1 class="display-4 fw-bold">Go networking
                            Next Level</h1>
                        <p class="mt-4 fw-light">Take Your Networking to the Next Level with NueLynx! Enjoy a free digital
                            profile with every card or upgrade for additional features. With NueLynx, you'll always stand
                            out from the competition.</p>
                    </div>
                </div>
            </div>
    </section>
    <!-- end about section -->

    <!-- start contact section -->
    <section class="p-5 mt-5 text-white bg-dark d-flex flex-column justify-content-center align-items-center"
        id="frontContactTab">
        <h2 class="fs-4">Subscribe Here</h2>
        <p class="fs-6 fw-lighter">Receive latest news, update, and many other things every week.
        </p>
        <a href="#!" class="header-logo">
            <img src="{{ getLogoUrl() }}" alt="Vcard" class="mt-4 img-fluid new-logo-image" />
        </a>
        <div class="mt-4 mb-3 input-group w-50 rounded-0">
            <input type="text" class="form-control" placeholder="Enter your email address"
                aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-primary">Subscribe</button>
        </div>
    </section>
    <!-- end contact section -->
@endsection
