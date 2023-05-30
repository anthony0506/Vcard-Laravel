@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset(getAppLogo()) }}" class="logo" width="120px" height="50px" style="object-fit: cover"
                 alt="{{ getAppName() }}">
        @endcomponent
    @endslot


    {{-- Body --}}
    <div>
	    <h2>{{ __('messages.mail.hello') }} <b>{{ $toName }}</b></h2>
	    <p><b>Your Withdrawal Request of amount {{ currencyFormat($amount,2) }} is Rejected.</b></p>
	    @if(!empty($rejectionNote))
		    <p><b>Reason :</b></p>
		    <p style="text-align: justify">{{ $rejectionNote }}</p>
	    @endif
	    <p>Thanks & Regards,</p>
	    <p>{{ getAppName() }}</p>
    </div>


    {{-- Footer --}}
    @slot('footer')
	    @component('mail::footer')
		    <h6>© {{ date('Y') }} {{ getAppName() }}.</h6>
        @endcomponent
    @endslot
@endcomponent
