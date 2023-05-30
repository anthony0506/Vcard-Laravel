@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset(getAppLogo()) }}" class="logo" width="120px" height="50px" style="object-fit: cover" alt="{{ getAppName() }}">
        @endcomponent
    @endslot


    {{-- Body --}}
    <div>
        <h2>{{ __('messages.mail.hello') }} <b>{{ $toName }}</b></h2>
        <p><b>{{ $name }}  {{ __('messages.mail.booked_appointment_with_you') }} </b>.</p>
        <p><b>{{ __('messages.mail.appointment_time') }} : </b> {{ $date }} - {{ $from_time }} {{__('messages.common.to')}} {{ $to_time }}</p>
        <p><b>{{ __('messages.mail.vcard_name') }} </b> {{ $vcard_name }}</p>
        <p>{{ getAppName() }}</p>
    </div>


    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <h6>© {{ date('Y') }} {{ getAppName() }}.</h6>
        @endcomponent
    @endslot
@endcomponent
