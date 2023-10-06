<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">

     <link href="{{ asset('backend/css/all.min.css') }}" rel="stylesheet">

    <title>{{__('messages.payment.payment_success')}}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/custom-vcard.css')}}">

</head>
<body>
<div class="container main-payment-success">
    <div class="payment-card">
        <div class="payment-head d-md-flex">
            <div class="payment-details">
                <div class="payment-info border-bottom">
                    <i class="fas fa-check-circle payment-icon mb-3"></i>
                    <h1 class="payment-title mb-3">{{__('messages.payment.payment_successful')}}</h1>
                    <p class="payment-text mb-4"></p>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{route('subscription.index')}}" type="button"
                       class="btn mt-5 btn-back">{{__('messages.common.back_subscription')}}</a>
                </div>

            </div>

            <div class="payment-img">
                <img src="{{asset('assets/img/success.png')}}">
            </div>

        </div>
    </div>
</div>


<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
