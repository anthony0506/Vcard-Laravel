@extends('front.layouts.app')
@section('title')
    {{ getAppName() }}
@endsection
@section('content')
    <style>
        .table-striped tbody tr,
        .table-striped tbody tr * {
            text-align: center;
            border: none;
            font-size: 0.9em;
        }

        .table-striped tbody tr td:nth-of-type(even) {
            background-color: #ecfcf4;
            color: #888787
        }

        .table-striped tbody tr td:nth-of-type(odd) {
            background-color: #ffffff;
            color: #888787
        }

        .table-striped.table-dark tbody tr td:nth-of-type(even) {
            background-color: #4e5657;
            color: white
        }

        .table-striped.table-dark tbody tr td:nth-of-type(odd) {
            background-color: #3d4245;
            color: white
        }

        .table-striped input {
            opacity: 1 !important;
        }
    </style>
    <!-- start features section -->
    <!-- <section class="mt-5 features-section" id="frontFeatureTab">
        <div class="container">
            <h2 class="mb-4 text-center display-6">
                {{__("auth.choose_a_plan_that's_right_for_you")}}
            </h2>
            <div class="p-4 my-2 bg-white row rounded-2">
                <h3 class="mb-3 text-center fs-4">Benefits</h3>
                <div class="row justify-content-center">
                    <div class="col-auto mb-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="plan" id="monthlyPlan" value="monthly"
                                checked>
                            <label class="form-check-label fw-lighter" for="monthlyPlan">Monthly</label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="plan" id="yearlyPlan" value="yearly">
                            <label class="form-check-label text-secondary " for="yearlyPlan">Yearly - <span
                                class="bg-opacity-25 badge bg-primary text-primary rounded-1">Save
                                20%</span></label>
                        </div>
                    </div>
                    <div class="flex-wrap row no-gutters d-flex">
                        <div class="mb-2 col-md-3">
                            <div class="border-0 card ">
                                <div class="p-0 m-0 text-center bg-white card-header d-flex align-items-baseline flex-column justify-content-end rounded-0"
                                    style="height: 9em">
                                    <h4 class="p-2 m-0 text-white w-100" style="background: #878787">All
                                        Features</h4>
                                </div>
                                <div class="p-0 m-0 card-body d-flex flex-column">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>Price</td>
                                        </tr>
                                        <tr>
                                            <td>Services</td>
                                        </tr>
                                        <tr>
                                            <td>No. of Digital Business Cards</td>
                                        </tr>
                                        <tr>
                                            <td>Customizable Profiles & QR codes</td>
                                        </tr>
                                        <tr>
                                            <td>Email Signatures & Backgrounds</td>
                                        </tr>
                                        <tr>
                                            <td>CRM Integrations</td>
                                        </tr>
                                        <tr>
                                            <td>Business Card Scanner</td>
                                        </tr>
                                        <tr>
                                            <td>Notifications</td>
                                        </tr>
                                        <tr>
                                            <td>Free Products</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="text-center bg-white card-footer text-muted rounded-0"
                                    style="background: white; height: 4em">
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 col-md-3">
                            <div class="border-0 card bg-dark ">
                                <div class="p-4 m-0 card-header bg-dark" style="height: 9em">
                                    <h2 class="text-white fs-5"> <span class="fw-bold"
                                        style="background: radial-gradient(96.91% 384.39% at 3.09% 66.67%, #00A353 0%, rgba(0, 163, 83, 0.49) 56.77%, #00A353 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                            Nuelynx</span>
                                        <span class="fw-lighter">
                                            Free
                                        </span>
                                    </h2>
                                    <h6 class="text-white-50">
                                        For individuals
                                    </h6>
                                    <button class="py-1 mt-2 btn btn-primary w-100 rounded-1">
                                        Choose Plan
                                    </button>
                                </div>
                                <div class="p-0 m-0 card-body d-flex flex-column">
                                    <table class="table table-dark table-striped">
                                        <tr>
                                            <td>Free</td>
                                        </tr>
                                        <tr>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>Basic</td>
                                        </tr>
                                        <tr>
                                            <td>Basic</td>
                                        </tr>
                                        <tr>
                                            <td>Basic</td>
                                        </tr>
                                        <tr>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>-</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 col-md-3">
                            <div class="border-0 card bg-dark rounded-2 position-relative">
                                <div class="top-0 position-absolute end-0 bg-primary "
                                    style="height: 3.5em; width: 3.5em; border-radius: 50%; margin-top: -1em; margin-right: 0.5em; display: flex; justify-content-center; align-items: center">
                                    <span class="text-center text-white">
                                        Best Price
                                    </span>
                                </div>
                                <div class="p-4 m-0 card-header bg-dark" style="height: 9em">
                                    <h2 class="text-white fs-5"> <span class="fw-bold"
                                            style="background: radial-gradient(96.91% 384.39% at 3.09% 66.67%, #00A353 0%, rgba(0, 163, 83, 0.49) 56.77%, #00A353 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                            Nuelynx</span>
                                        <span class="fw-lighter">
                                            Pro
                                        </span>
                                    </h2>
                                    <h6 class="text-white-50">
                                        For small business
                                    </h6>
                                    <button class="py-1 mt-2 btn btn-primary w-100 rounded-1">
                                        Choose Plan
                                    </button>
                                </div>
                                <div class="p-0 m-0 card-body d-flex flex-column">
                                    <table class="table table-dark table-striped">
                                        <tr>
                                            <td>$17 USD Monthly</td>
                                        </tr>
                                        <tr>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                        </tr>
                                        <tr>
                                            <td>Advanced</td>
                                        </tr>
                                        <tr>
                                            <td>Basic</td>
                                        </tr>
                                        <tr>
                                            <td>Basic</td>
                                        </tr>
                                        <tr>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Yes</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 col-md-3">
                            <div class="border-0 card bg-dark position-relative">
                                <div class="p-4 m-0 card-header bg-dark" style="height: 9em">
                                    <h2 class="text-white fs-5"> <span class="fw-bold"
                                        style="background: radial-gradient(96.91% 384.39% at 3.09% 66.67%, #00A353 0%, rgba(0, 163, 83, 0.49) 56.77%, #00A353 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                            Nuelynx</span>
                                        <span class="fw-lighter">
                                            Business
                                        </span>
                                    </h2>
                                    <h6 class="text-white-50">
                                        For big business
                                    </h6>
                                    <button class="py-1 mt-2 btn btn-primary w-100 rounded-1">
                                        Choose Plan
                                    </button>
                                </div>
                                <div class="p-0 m-0 card-body d-flex flex-column">
                                    <table class="table table-dark table-striped">
                                        <tr>
                                            <td>$25 USD Monthly</td>
                                        </tr>
                                        <tr>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Unlimited</td>
                                        </tr>
                                        <tr>
                                            <td>Advanced</td>
                                        </tr>
                                        <tr>
                                            <td>Advanced</td>
                                        </tr>
                                        <tr>
                                            <td>Advanced</td>
                                        </tr>
                                        <tr>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Yes</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- end features section -->

    <!-- start features section -->
    <section class="features-section feature-pricing-section padding-b-100px padding-t-100px" id="pricingHome">
        <div class="container">
            <h2 class="mb-4 text-center display-6">
                Know our Plans in Detail </h2>
            <div class="plans-description my-2 bg-white rounded-2">
                <h3 class="mb-3 text-center fs-4">Benefits</h3>
                <div class="row justify-content-center">
                    <div class="col-auto mb-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="plan" id="monthly" value="monthly"
                                checked>
                            <label class="form-check-label fw-lighter" for="monthly">Monthly</label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="plan" id="yearly" value="yearly">
                            <label class="form-check-label text-secondary " for="yearly">Yearly - <span
                                    class="bg-opacity-25 badge bg-primary text-primary rounded-1">Save
                                    20%</span></label>
                        </div>
                    </div>
                    <div class="no-gutters d-flex w-100 justify-content-center" style="">
                        <div class="mb-2 features-list" style="">
                            <div class="border-0 card ">
                                <div class="features-header p-0 m-0 text-center bg-white card-header d-flex align-items-baseline flex-column justify-content-end rounded-0"
                                    style="height: 9em">
                                    <h4 class="p-2 m-0 text-white w-100" style="background: #878787">All
                                        Features</h4>
                                </div>
                                <div class="p-0 m-0 card-body d-flex flex-column">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>Price</td>
                                        </tr>
                                        @foreach(getPlanFeature($plans[0]) as $feature => $value)
                                        <tr>
                                            <td>{{ __('messages.feature.'.$feature) }}</td>
                                        </tr>
                                        @endforeach
                                    </table>

                                </div>
                                <div class="text-center bg-white card-footer text-muted rounded-0"
                                    style="background: white; height: 4em">
                                </div>
                            </div>
                        </div>

                        <div class="mb-2 monthly-plans d-flex" style="">
                        @foreach($plans as $plan)
                            @if($plan->frequency == 1)
                                <div class="monthly-plans-dyn">
                                    <div class="border-0 card bg-dark ">
                                        <div class="p-4 m-0 card-header bg-dark" style="height: 9em">
                                            <h2 class="text-white fs-5"> <span class="fw-bold"
                                                    style="background: radial-gradient(96.91% 384.39% at 3.09% 66.67%, #00A353 0%, rgba(0, 163, 83, 0.49) 56.77%, #00A353 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                                    Nuelynx</span>
                                                <span class="fw-lighter">
                                                    {{ $plan->name }}
                                                </span>
                                            </h2>
                                            <h6 class="text-white-50">
                                            {{__('messages.plan.no_of_vcards')}}
                                            : {{$plan->no_of_vcards }}
                                            </h6>
                                            @if(getLogInUser() && getLoggedInUserRoleId() != getSuperAdminRoleId())
                                                <div class="mx-auto">
                                                    
                                                    @if(!empty(getCurrentSubscription()) && $plan->id == getCurrentSubscription()->plan_id && !getCurrentSubscription()->isExpired())
                                                        @if($plan->price != 0)
                                                            <button type="button"
                                                                    class="py-1 mt-2 btn btn-primary w-100 rounded-1"
                                                                    data-id="{{ $plan->id }}"
                                                                    data-turbo="false">
                                                                {{ __('messages.subscription.currently_active') }}</button>
                                                        @else
                                                            <button type="button"
                                                                    class="py-1 mt-2 btn btn-primary w-100 rounded-1" data-turbo="false">
                                                                {{ __('messages.subscription.renew_free_plan') }}
                                                            </button>
                                                        @endif
                                                    @else
                                                        @if(!empty(getCurrentSubscription()) && !getCurrentSubscription()->isExpired() && ($plan->price == 0 || $plan->price != 0))
                                                            <a href="{{ route('choose.payment.type', $plan->id) }}"
                                                            class="py-1 mt-2 btn btn-primary w-100 rounded-1 {{ $plan->price == 0 ? 'freePayment' : ''}}"
                                                            data-id="{{ $plan->id }}"
                                                            data-plan-price="{{ $plan->price }}"
                                                            data-turbo="false">
                                                                {{ __('messages.subscription.switch_plan') }}</a>
                                                        @else
                                                            <a href="{{ route('choose.payment.type', $plan->id) }}"
                                                            class="py-1 mt-2 btn btn-primary w-100 rounded-1 {{ $plan->price == 0 ? 'freePayment' : ''}}"
                                                            data-id="{{ $plan->id }}"
                                                            data-plan-price="{{ $plan->price }}"
                                                            data-turbo="false">
                                                                {{ __('messages.subscription.choose_plan') }}</a>
                                                        @endif
                                                    @endif
                                                </div>
                                            @else
                                                <div class="mx-auto">
                                                    <a href="{{ route('choose.payment.type', $plan->id) }}"
                                                    class="py-1 mt-2 btn btn-primary w-100 rounded-1 {{ $plan->price == 0 ? 'freePayment' : ''}}"
                                                    data-id="{{ $plan->id }}"
                                                    data-plan-price="{{ $plan->price }}"
                                                    data-turbo="false">
                                                        {{ __('messages.subscription.choose_plan') }}</a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="p-0 m-0 card-body d-flex flex-column">
                                            <table class="table table-dark table-striped">
                                                <tr>
                                                    <td>{{ $plan->currency->currency_icon }} {{ number_format($plan->price) }}</td>
                                                </tr>
                                                @foreach(getPlanFeature($plan) as $feature => $value)
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="disabledCheckbox_{{ $feature }}" disabled {{ $value == 1 ? 'checked' : '' }}>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>

                                        </div>

                                    </div>
                                </div>
                            @endif
                        @endforeach
                        </div>

                        <div class="mb-2 yearly-plans d-flex d-none">
                        @foreach($plans as $plan)
                            @if($plan->frequency == 2)
                                <div class="yearly-plans-dyn">
                                    <div class="border-0 card bg-dark ">
                                        <div class="p-4 m-0 card-header bg-dark" style="height: 9em">
                                            <h2 class="text-white fs-5"> <span class="fw-bold"
                                                    style="background: radial-gradient(96.91% 384.39% at 3.09% 66.67%, #00A353 0%, rgba(0, 163, 83, 0.49) 56.77%, #00A353 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                                    Nuelynx</span>
                                                <span class="fw-lighter">
                                                    {{ $plan->name }}
                                                </span>
                                            </h2>
                                            <h6 class="text-white-50">
                                            {{__('messages.plan.no_of_vcards')}}
                                            : {{$plan->no_of_vcards }}
                                            </h6>
                                            @if(getLogInUser() && getLoggedInUserRoleId() != getSuperAdminRoleId())
                                                <div class="mx-auto">
                                                    
                                                    @if(!empty(getCurrentSubscription()) && $plan->id == getCurrentSubscription()->plan_id && !getCurrentSubscription()->isExpired())
                                                        @if($plan->price != 0)
                                                            <button type="button"
                                                                    class="py-1 mt-2 btn btn-primary w-100 rounded-1"
                                                                    data-id="{{ $plan->id }}"
                                                                    data-turbo="false">
                                                                {{ __('messages.subscription.currently_active') }}</button>
                                                        @else
                                                            <button type="button"
                                                                    class="py-1 mt-2 btn btn-primary w-100 rounded-1" data-turbo="false">
                                                                {{ __('messages.subscription.renew_free_plan') }}
                                                            </button>
                                                        @endif
                                                    @else
                                                        @if(!empty(getCurrentSubscription()) && !getCurrentSubscription()->isExpired() && ($plan->price == 0 || $plan->price != 0))
                                                            <a href="{{ route('choose.payment.type', $plan->id) }}"
                                                            class="py-1 mt-2 btn btn-primary w-100 rounded-1 {{ $plan->price == 0 ? 'freePayment' : ''}}"
                                                            data-id="{{ $plan->id }}"
                                                            data-plan-price="{{ $plan->price }}"
                                                            data-turbo="false">
                                                                {{ __('messages.subscription.switch_plan') }}</a>
                                                        @else
                                                            <a href="{{ route('choose.payment.type', $plan->id) }}"
                                                            class="py-1 mt-2 btn btn-primary w-100 rounded-1 {{ $plan->price == 0 ? 'freePayment' : ''}}"
                                                            data-id="{{ $plan->id }}"
                                                            data-plan-price="{{ $plan->price }}"
                                                            data-turbo="false">
                                                                {{ __('messages.subscription.choose_plan') }}</a>
                                                        @endif
                                                    @endif
                                                </div>
                                            @else
                                                <div class="mx-auto">
                                                    <a href="{{ route('choose.payment.type', $plan->id) }}"
                                                    class="py-1 mt-2 btn btn-primary w-100 rounded-1 {{ $plan->price == 0 ? 'freePayment' : ''}}"
                                                    data-id="{{ $plan->id }}"
                                                    data-plan-price="{{ $plan->price }}"
                                                    data-turbo="false">
                                                        {{ __('messages.subscription.choose_plan') }}</a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="p-0 m-0 card-body d-flex flex-column">
                                            <table class="table table-dark table-striped">
                                                <tr>
                                                    <td>{{ $plan->currency->currency_icon }} {{ number_format($plan->price) }}</td>
                                                </tr>
                                                @foreach(getPlanFeature($plan) as $feature => $value)
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="disabledCheckbox_{{ $feature }}" disabled {{ $value == 1 ? 'checked' : '' }}>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>

                                        </div>

                                    </div>
                                </div>
                            @endif
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end features section -->

    <!-- start contact section -->
    <section class="py-5 contact-section" id="frontContactTab"
        style="background-image:url({{ asset('front/images/contact-image.png') }}); background-position: 'center center'; background-size:'contain'">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="fs-3">{{__('messages.contact_us.contact')}}</h1>
                    <form class="contact-form" id="myForm">
                        @csrf
                        <div id="contactError" class="alert alert-danger d-none"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="text-black-50">
                                    Name *
                                </label>
                                <div class="contact-form__input-block">
                                    <input name="name" id="name" type="text"
                                        class="px-2 py-1 form-control rounded-0"
                                        placeholder="{{ __('messages.front.enter_your_name') }}*" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="contact-form__input-block">
                                    <label class="text-black-50">
                                        Email Address *
                                    </label>
                                    <input name="email" id="email" type="email"
                                        class="px-2 py-1 form-control rounded-1"
                                        placeholder="{{ __('messages.front.enter_your_email') }}*" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="contact-form__input-block">
                                    <label class="text-black-50">
                                        Subject *
                                    </label>
                                    <input name="subject" id="subject" type="text"
                                        class="px-2 py-1 form-control rounded-1"
                                        placeholder="{{ __('messages.common.subject') }}*" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="contact-form__input-block">
                                    <label class="text-black-50">
                                        Message *
                                    </label>
                                    <textarea name="message" id="message" rows="4" class="px-2 py-1 form-control form-textarea rounded-1"
                                        placeholder="{{ __('messages.front.enter_your_message') }}*" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <input type="submit" id="submit" name="send"
                                    class="px-4 py-2 btn btn-primary rounded-1"
                                    value="{{ __('messages.contact_us.send_message') }}">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <img src="{{ !isset($setting['home_page_banner']) ? $setting['home_page_banner'] : asset('front/images/circle.png') }}"
                        alt="Vcard" class="img-fluid image-object-fit-cover" />
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->
@endsection
