@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset(getAppLogo()) }}" class="logo" width="120px" height="50px" style="object-fit: cover" alt="{{ getAppName() }}">
        @endcomponent
    @endslot
    <h2>Hello, {{ $email['first_name'] }} {{ $email['last_name'] }}</h2>
    <p>{{ __('messages.mail.thank_you_chose') }}</p>
    <p>{{ __('messages.mail.please_follow') }}</p>
     {!! $input !!}
    <p>{{ __('messages.mail.thanks_regard') }}</p>
    <p>{{ getAppName() }}</p>
    @slot('footer')
        @component('mail::footer')
            <h6>© {{ date('Y') }} {{ getAppName() }}.</h6>
        @endcomponent
    @endslot
@endcomponent
