@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang(__('messages.mail.whoops'))
@else
# @lang(__('messages.mail.hello!'))
@endif
@endif

{{-- Intro Lines --}}
{{__('messages.mail.please_click')}}

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{__('messages.mail.verify_email') }}
@endcomponent
@endisset

{{-- Outro Lines --}}

{{__('messages.mail.action_required')}}

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang(__('messages.mail.regard'))<br>
{{ getAppName() }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(__('messages.mail.slot_text')) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
