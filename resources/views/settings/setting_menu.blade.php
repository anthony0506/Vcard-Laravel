<div>
    <ul class="nav nav-tabs mb-5 pb-1 overflow-auto flex-nowrap text-nowrap" id="myTab" role="tablist">
        <li class="nav-item position-relative me-7 mb-3">
            <a class="nav-link me-0 p-0 {{ (isset($sectionName) && $sectionName == 'general') ? 'active' : '' }}"    href="{{ route('setting.index',['section' => 'general']) }}">{{ __('messages.setting.general') }}</a>
        </li>
        
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <a class="nav-link me-0 p-0 {{ (isset($sectionName) && $sectionName == 'terms-conditions') ? 'active' : '' }}"
               href="{{ route('setting.index',['section' => 'terms-conditions']) }}">{!! __('messages.vcard.term_condition') !!}</a>
        </li>

        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <a class="nav-link me-0 p-0 {{ (isset($sectionName) && $sectionName == 'manual_payment_guide') ? 'active' : '' }}"
               href="{{ route('setting.index',['section' => 'manual_payment_guide']) }}">{{__('messages.vcard.manual_payment_guide') }}</a>
        </li>
    </ul>
</div>
