<script defer>
    document.addEventListener('DOMContentLoaded', function() {
        var header = document.getElementById("header");
        window.addEventListener("scroll", function() {
            if (window.pageYOffset > 100) {
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        });
    });

    $(window).scroll(function () {
        var sticky = $('.header'),
            scroll = $(window).scrollTop()

        if (scroll >= 120) sticky.addClass('fixed')
        else sticky.removeClass('fixed')
    })

    $('.nav-item').on('click', function () {
        $('#header').addClass('fixed');
    })

    var handleNavClick = (event) => {
            event.preventDefault();
            console.log(event.target.href)
            window.location.href = event.target.href;
    }
</script>

<header class="header" id="header" style="z-index: 2;">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="col-lg-1 col-3">
                <a href="{{ url('/#frontHomeTab') }}" class="header-logo">
                    <img src="{{ getLogoUrl() }}" alt="Vcard" class="img-fluid new-logo-image" />
                </a>
            </div>
            <div class="col-lg-8 col">
                <nav class="navbar navbar-expand-lg navbar-light justify-content-end">
                    <button class="p-0 border-0 navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="px-3 nav-link text-dark" href="{{ url('/#frontHomeTab') }}" onclick="handleNavClick(event)">
                                    {{ __('auth.home') }}
                                </a>
                            </li>
                            <li class="px-3 nav-item">
                                <a class="nav-link text-dark" href="{{ url('/#frontFeatureTab') }}" onclick="handleNavClick(event)">
                                    {{ __('auth.features') }}
                                </a>
                            </li>
                            <li class="px-3 nav-item">
                                <a class="nav-link text-dark" href="{{ url('/#frontAboutTab') }}" onclick="handleNavClick(event)">
                                    {{ __('auth.about') }}
                                </a>
                            </li>
                            <li class="px-3 nav-item">
                                <a class="nav-link text-dark" href="{{ url('/pricing#pricingHome') }}" onclick="handleNavClick(event)">
                                    {{ __('auth.pricing') }}
                                </a>
                            </li>
                            <li class="px-3 nav-item">
                                <a class="nav-link text-dark" href="{{ url('/pricing#frontContactTab') }}" onclick="handleNavClick(event)">
                                    {{ __('auth.contact') }}
                                </a>
                            </li>
                            <li class="px-3 nav-item">
                                @php
                                    $styleCss = 'style';
                                @endphp
                                <div class="px-3 bg-white bg-opacity-50 border dropdown rounded-2">
                                    <a class="btn dropdown-toggle" href="javascript:void(0)" role="button"
                                        id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ getLanguageByKey(checkFrontLanguageSession()) }}
                                    </a>
                                    <ul class="overflow-auto dropdown-menu"
                                        {{ $styleCss }}="
                                        min-width: 200px; height:221px"
                                        aria-labelledby="languageDropdown">
                                        @foreach (getAllLanguage() as $key => $value)
                                        <li class="languageSelection {{ checkFrontLanguageSession() == $key ? 'active' : '' }}"
                                            data-prefix-value="{{ $key }}"
                                            {{ $styleCss }}="max-height: 40px">
                                            <a class="dropdown-item {{ checkFrontLanguageSession() == $key ? 'active' : '' }}"
                                                href="javascript:void(0)">
                                                @if (array_key_exists($key, \App\Models\User::FLAG))
                                                    @foreach (\App\Models\User::FLAG as $imageKey => $imageValue)
                                                        @if ($imageKey == $key)
                                                            <img class="me-2 country-flag" style="width: 20px;"
                                                                src="{{ asset($imageValue) }}" />
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <i class="fa fa-flag me-2 fs-7 text-danger" aria-hidden="true"
                                                        style="width: 20px;"></i>
                                                @endif
                                                {{ $value }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="flex col-lg-3 col-8 text-end header-btn align-items-center justify-content-between">
                @if(empty(getLogInUser()))
                    <a class="px-4 py-1 btn btn-outline-primary rounded-2 nav-btn" href="{{ route('login') }}"
                        data-turbo="false">
                        Login
                    </a>
                    <a class="px-4 py-1 btn btn-outline-primary rounded-2 nav-btn" href="{{ route('register') }}" data-turbo="false">
                        Sign Up
                    </a>
                @else
                    @if(getLogInUser()->hasrole('admin') || getLogInUser()->hasrole('user'))
                        <a class="btn btn-primary nav-btn" href="{{ route('admin.dashboard') }}" data-turbo="false">
                            {{ __('messages.dashboard') }}
                        </a>
                    @endif
                    @if(getLogInUser()->hasrole('super_admin'))
                        <a class="btn btn-primary nav-btn" href="{{ route('sadmin.dashboard') }}" data-turbo="false">
                            {{ __('messages.dashboard') }}
                        </a>
                    @endif
                @endif
            </div>
        </div>
    </div>
</header>
