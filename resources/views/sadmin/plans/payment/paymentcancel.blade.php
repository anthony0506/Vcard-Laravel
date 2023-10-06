<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">

    <title>{{__('messages.payment.payment_cancel')}}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/custom-vcard.css')}}">

</head>
<body>

<div class="container main-payment">
    <div class="payment-section position-relative py-5 px-sm-3">
        <div>
            <img src="{{asset('assets/img/payment.png')}}" class="img-fluid">
        </div>
        <div class="payment-heading position-absolute top-50 translate-middle-y">
            <h1 class="payment-title">{{__('messages.payment.payment')}}</h1>
            <p class="payment-text">{{__('messages.payment.cancelled')}}</p>
            <a href="{{route('subscription.upgrade')}}" type="button" class="btn payment-btn">{{__('messages.common.back')}}</a>
        </div>
    </div>
</div>


<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>


</body>
</html>
