<header class='d-flex align-items-center justify-content-between flex-grow-1 header px-3 px-xl-0'>
    <button type="button" class="btn px-0 aside-menu-container__aside-menubar d-block d-xl-none sidebar-btn">
        <i class="fa-solid fa-bars fs-1"></i>
    </button>
    <nav class="navbar navbar-expand-xl navbar-light top-navbar d-xl-flex d-block px-3 px-xl-0 py-4 py-xl-0 {{ !getLogInUser()->theme_mode ? 'bg-white' : '' }}" id="nav-header">
        <div class="container-fluid pe-0">
            <div class="navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @include('layouts.sub_menu')
                </ul>
            </div>
        </div>
    </nav>
    <ul class="nav align-items-center flex-nowrap">
        @if(getLogInUser()->theme_mode)
            <li class="px-xxl-3 px-2">
                <a data-turbo="false" href="{{ route('mode.theme') }}" title="{{__('messages.tooltip.light_mode')}}">
                    <i class="fa-solid fa-sun text-primary fs-2"></i>
                </a>
            </li>
        @else
            <li class="px-xxl-3 px-2">
                <a data-turbo="false" href="{{ route('mode.theme') }}" title="{{__('messages.tooltip.dark_mode')}}">
                    <i class="fa-solid fa-moon text-primary fs-2"></i>
                </a>
            </li>
        @endif

        @role(\App\Models\Role::ROLE_ADMIN)
        @if(!empty(getCurrentSubscription()) && getCurrentSubscription()->plan->is_trial)
            <li class="px-xxl-3 px-2">
                <span class="text-primary">
                    {{ __('messages.subscription.trial_plan') }}
                </span>
            </li>
        @endif
        @endrole

        @impersonating
        <li class="px-xxl-3 px-2">
            <span class="text-primary">
                <a data-turbo="false" data-turbo-eval="false" href="{{ route('impersonate.leave') }}">
                    <i class="fas fa-user-check fs-2"></i>
                </a>
            </span>
        </li>
        @endImpersonating

        <li class="px-xxl-3 px-2">
            <div class="dropdown d-flex align-items-center py-4">
                <div class="image image-circle image-mini">
                    <img src="{{ getLogInUser()->profile_image }}"
                         class="img-fluid" alt="profile image">
                </div>
                <button class="btn dropdown-toggle ps-2 pe-0" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    {!! getLogInUser()->full_name !!}
                </button>
                <div class="dropdown-menu py-7 pb-4 my-2" aria-labelledby="dropdownMenuButton1" data-bs-auto-close="outside">
                    <div class="text-center border-bottom pb-5">
                        <div class="image image-circle image-tiny mb-5">
                            <img src="{{ getLogInUser()->profile_image }}" class="img-fluid" alt="profile image">
                        </div>
                        <h3 class="text-gray-900">{{ getLogInUser()->full_name }}</h3>
                        <h4 class="mb-0 fw-400 fs-6">{{ getLogInUser()->email }}</h4>
                    </div>
                    <ul class="pt-4">
                        <li>
                            <a class="dropdown-item text-gray-900" href="{{ route('profile.setting') }}">
                            <span class="dropdown-icon me-4 text-gray-600">
                                <i class="fa-solid fa-user"></i>
                            </span>
                                {{ __('messages.user.account_setting') }}
                            </a>
                        </li>
                        @role(\App\Models\Role::ROLE_ADMIN)
                            <li>
                                <a class="dropdown-item text-gray-900" href="{{ route('subscription.index') }}">
                                    <span class="dropdown-icon me-4 text-gray-600">
                                        <i class="fa-solid fa-money-bill"></i>
                                    </span>
                                    {{ __('messages.subscription.manage_subscription') }}</a>
                            </li>
                        @endrole
                        @if((is_impersonating() === false))
                            <li>
                                <a class="dropdown-item text-gray-900" id="changePassword" href="javascript:void(0)">
                                    <span class="dropdown-icon me-4 text-gray-600">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                    {{ __('messages.user.change_password') }}
                                </a>
                            </li>
                        @endif
                        <li>
                            <a class="dropdown-item text-gray-900" id="changeLanguage" href="javascript:void(0)">
                               <span class="dropdown-icon me-4 text-gray-600">
                                   <i class="fa-solid fa-globe"></i>
                               </span>
                                {{ __('messages.user.change_language') }}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-gray-900 d-flex" href="javascript:void(0)">
                                <span class="dropdown-icon me-4 text-gray-600">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </span>
                                <form id="logout-form" action="{{ route('logout')}}" method="post">
                                    @csrf
                                </form>
                                <span onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                                    {{ __('messages.sign_out') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <button type="button" class="btn px-0 d-block d-xl-none header-btn pb-2">
                <i class="fa-solid fa-bars fs-1"></i>
            </button>
        </li>
    </ul>
</header>
<div class="bg-overlay" id="nav-overly"></div>
