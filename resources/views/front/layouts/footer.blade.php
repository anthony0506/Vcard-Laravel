<!-- start footer section -->
<footer style="z-index: 2;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12  text-center">
                <ul class="ps-0 d-flex justify-content-evenly">
                    <li class="w-25">
                        @if ($setting['terms_conditions'] !== '')
                            <a href="{{ route('terms.conditions') }}"
                                class="text-decoration-none  mb-3  fw-light fs-6 {{ request()->routeIs('terms.conditions') ? 'active' : 'text-primary' }}">{!! __('messages.vcard.term_condition') !!}</a>
                        @endif
                    </li>
                    <li class="w-25">
                        @if ($setting['privacy_policy'] !== '')
                            <a href="{{ route('privacy.policy') }}"
                                class="text-decoration-none  mb-3  fw-light fs-6 {{ request()->routeIs('privacy.policy') ? 'active' : 'text-primary' }}">{{ __('messages.vcard.privacy_policy') }}</a>
                        @endif
                    </li>
                    <li class="w-25">
                        @if ($setting['privacy_policy'] !== '')
                            <a href="{{ route('privacy.policy') }}"
                                class="text-decoration-none  mb-3 fw-light fs-6 text-center {{ request()->routeIs('privacy.policy') ? 'active' : 'text-primary' }}">Know
                                More</a>
                        @endif
                    </li>
                </ul>
                <ul class="ps-0 flex d-flex justify-content-evenly">
                    <li class="w-25">
                        <a class="text-decoration-none  mb-3 text-secondary fw-light fs-6 text-center">
                            © {{ \Carbon\Carbon::now()->year }}
                            {{__('auth.copyright_by')." "}} <span class="text-success">{{ $setting['app_name'] }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- end footer section -->