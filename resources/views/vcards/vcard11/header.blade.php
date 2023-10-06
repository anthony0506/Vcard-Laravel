<!-- start top-header-section -->
<div class="top-header px-sm-4 px-3 py-3">
    <div class="row ps-lg-0 ps-5 align-items-center">
        <div class=" col-lg-3 col-sm-5 col-7 ps-lg-0 ps-sm-4 ps-3">
            <a href="{{ route('vcard11.index') }}" class="fs-14 text-white  home"><i
                        class="fa-solid fa-house me-sm-3 me-2"></i></a> <span
                    class="fs-14 text-white home">@yield('page_name')</span>
        </div>
        <div class=" col-lg-9  col-sm-7 col-5 text-end d-flex justify-content-end align-items-center">
            <a href="{{ route('vcard11.contact') }}" class="fs-14 text-white me-5 contact d-sm-inline-block d-none"><i
                        class="far fa-envelope me-2"></i> Get in Touch</a>
            <div class="dropdown">
                <button class="dropbtn btn btn-primary d-lg-none d-block fs-14"><i
                            class="fa-solid fa-language "></i></button>
                <button class="dropbtn btn btn-primary d-lg-block d-none fs-14"><i
                            class="fa-solid fa-language me-2"></i>Language<i class="ps-1 fa-solid fa-sort-down"></i>
                </button>
                <div id="myDropdown" class="dropdown-content text-start">
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center ">
                        <img class="me-2 country-flag" src="https://hms.infyom.com/assets/img/iraq.svg"> Arabic</a>
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center">
                        <img class="me-2 country-flag" src="https://hms.infyom.com/assets/img/china.svg">
                        Chinese</a>
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center">
                        <img class="me-2 country-flag" src="https://hms.infyom.com/assets/img/united-states.svg">
                        English</a>
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center">
                        <img class="me-2 country-flag" src="https://hms.infyom.com/assets/img/france.svg">
                        French</a>
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center">
                        <img class="me-2 country-flag" src="https://hms.infyom.com/assets/img/germany.svg">
                        German</a>
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center">
                        <img class="me-2 country-flag" src="https://hms.infyom.com/assets/img/portugal.svg">
                        Portuguese</a>
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center">
                        <img class="me-2 country-flag" src="https://hms.infyom.com/assets/img/russia.svg">
                        Russian</a>
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center">
                        <img class="me-2 country-flag" src="https://hms.infyom.com/assets/img/spain.svg">
                        Spanish</a>
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center">
                        <img class="me-2 country-flag" src="https://hms.infyom.com/assets/img/turkey.svg">
                        Turkish</a>
                </div>
            </div>

            <div class="sharedropdown">
                <button class="sharedropbtn btn btn-primary d-lg-inline-block d-none fs-14 ms-sm-4 "><i
                            class="fas fa-share-alt me-2"></i>{{__('messages.vcard.share')}}</button>
                <a class="sharedropbtn btn btn-primary share d-lg-none d-lg-inline-block ms-sm-4 ms-3">
                    <i class="fas fa-share-alt text-white"></i>
                </a>
                <div id="shareDropdown" class="sharedropdown-content">
                    <div class="icons d-flex justify-content-between">
                        <div class="share-icon border-gradient border-gradient-orange d-flex justify-content-center align-items-center">
                            <a href="#!"><i
                                        class="fa-brands fa-facebook-f d-flex justify-content-center align-items-center"></i></a>
                        </div>
                        <div class="share-icon border-gradient border-gradient-orange d-flex justify-content-center align-items-center">
                            <a href="#!"><i
                                        class="fa-brands fa-instagram d-flex justify-content-center align-items-center"></i></a>
                        </div>
                        <div class="share-icon border-gradient border-gradient-orange d-flex justify-content-center align-items-center">
                            <a href="#!"><i
                                        class="fa-brands fa-twitter d-flex justify-content-center align-items-center"></i></a>
                        </div>
                        <div class="share-icon border-gradient border-gradient-orange d-flex justify-content-center align-items-center">
                            <a href="#!"><i
                                        class="fa-brands fa-pinterest-p d-flex justify-content-center align-items-center"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end top-header-section -->

<!-- start offcanvas-section -->
<a class="bars d-inline-block" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
   aria-controls="offcanvasExample" style="z-index: 99999;">
    <i class="d-lg-none d-block fas fa-bars d-flex justify-content-center align-items-center text-white"></i>
</a>
<div class="offcanvas offcanvas-start position-absolute bg-transparent d-lg-none d-block" tabindex="-1"
     id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"
                style="z-index: 99999;"></button>
    </div>
    <div class="offcanvas-body main-header">
        <header class=" p-4">
            <div class="hero-img position-relative br-15 mb-5">
                <img src="{{ asset('assets/img/vcard11/hero-content.jpeg') }}"
                     class="w-100 h-100 object-fit-cover br-15">
                <div class=" d-flex icon-box position-absolute">
                    <div class="social-icon  me-3 border-gradient border-gradient-orange d-flex justify-content-center align-items-center">
                        <a href="#!"><i
                                    class="fa-brands fa-facebook-f d-flex justify-content-center align-items-center"></i></a>
                    </div>
                    <div class="social-icon me-3 d-flex justify-content-center align-items-center">
                        <a href="#!"><i
                                    class="fa-brands fa-instagram d-flex justify-content-center align-items-center"></i></a>
                    </div>
                    <div class="social-icon me-3 d-flex justify-content-center align-items-center">
                        <a href="#!"><i
                                    class="fa-brands fa-twitter d-flex justify-content-center align-items-center"></i></a>
                    </div>
                    <div class="social-icon me-3 d-flex justify-content-center align-items-center">
                        <a href="#!"> <i
                                    class="fa-brands fa-pinterest-p d-flex justify-content-center align-items-center"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="nav-tabs nav flex-column nav-pills me-3" id="v-pills-tab1" role="tablist"
                     aria-orientation="vertical">
                    <a href="{{ route('vcard11.index') }}" class="nav-link active"><i
                                class="fa-solid fa-house me-3"></i>Home</a>
                    {{--                    <a href="{{ route('vcard11.resume') }}" class="nav-link"><i--}}
                    {{--                                class="fa-solid fa-file-lines me-3"></i>Resume</a>--}}
                    {{--                    <a href="{{ route('vcard11.portfolio') }}" class="nav-link"><i--}}
                    {{--                                class="fa-solid fa-images me-3"></i>Portfolio</a>--}}
                    <a href="{{ route('vcard11.contact') }}" class="nav-link"><i
                                class="fa-solid fa-envelope me-3"></i>Contact</a>
                    <a href="{{ route('vcard11.blog') }}" class="nav-link"><i class="fa-solid fa-book me-3"></i>Blog</a>
                    <a href="{{ route('vcard11.portfolio-single') }}" class="nav-link"><i
                                class="fa-regular fa-file-lines me-3"></i>Privacy Policy</a>
                    <a href="{{ route('vcard11.portfolio-single-2') }}" class="nav-link"><i
                                class="fa-solid fa-images me-2"></i> Terms & Conditions</a>
                    {{--                    <a href="#!" class="nav-link border-0" onclick="openbars1()" id="v-nav-tab"><i--}}
                    {{--                                class="fa-solid fa-layer-group me-3"></i>Pages<i--}}
                    {{--                                class="fa-solid fa-plus text-end"></i></a>--}}
                </div>
                {{--                <div class="nav nav-tabs " id="pages-menu1" role="tablist">--}}
                {{--                    <a href="#!" class="nav-link active" onclick="closebars1()"><i--}}
                {{--                                class="fa-solid fa-chevron-left"></i></a>--}}
                {{--                    <a href="{{ route('vcard11.portfolio-single') }}" class="nav-link"><i--}}
                {{--                                class="fa-regular fa-file-lines me-3"></i>Portfolio Single</a>--}}
                {{--                    <a href="{{ route('vcard11.portfolio-single-2') }}" class="nav-link"><i--}}
                {{--                                class="fa-solid fa-images me-3"></i>Portfolio--}}
                {{--                        Single 2</a>--}}
                {{--                    <a href="{{ route('vcard11.blog-single') }}" class="nav-link"><i--}}
                {{--                                class="fa-solid fa-envelope me-3"></i>Blog Single</a>--}}

                {{--                </div>--}}
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 text-center">
                    <a href="#!" download="" class="btn btn-primary"><i class="fas fa-download"></i> Download VCard</a>
                </div>
            </div>
        </header>
    </div>
</div>
<!-- end offcanvas-section -->

<header class="main-header p-4 d-lg-block d-none">
    <div class="hero-img position-relative br-15 mb-3">
        <img src="{{ asset('assets/img/vcard11/hero-content.jpeg') }}" class="w-100 h-100 object-fit-cover br-15">
    </div>
        <div class="d-flex icon-box justify-content-center">
            <div class="social-icon me-3 border-gradient border-gradient-orange d-flex justify-content-center align-items-center">
                <a href="#"><i
                            class="fa-brands fa-facebook-f d-flex justify-content-center align-items-center"></i></a>
            </div>
            <div class="social-icon me-3 d-flex justify-content-center align-items-center">
                <a href="#"><i class="fa-brands fa-instagram d-flex justify-content-center align-items-center"></i></a>
            </div>
            <div class="social-icon me-3 d-flex justify-content-center align-items-center">
                <a href="#"><i
                            class="fa-brands fa-twitter d-flex justify-content-center align-items-center"></i></a>
            </div>
            <div class="social-icon me-3 d-flex justify-content-center align-items-center">
                <a href="#"> <i
                            class="fa-brands fa-pinterest-p d-flex justify-content-center align-items-center"></i>
                </a>
            </div>
        </div>
    <div class="">
        <div class="nav-tabs nav flex-column nav-pills me-3 mt-3" id="v-pills-tab" role="tablist"
             aria-orientation="vertical">
            <a href="{{ route('vcard11.index') }}" class="nav-link {{ Request::is('vcard11') ? 'active' : '' }}"><i
                        class="fa-solid fa-house me-3"></i>Home</a>
            <a href="{{ route('vcard11.contact') }}"
               class="nav-link {{ Request::is('vcard11/contact*') ? 'active' : '' }}"><i
                        class="fa-solid fa-envelope me-3"></i>Contact</a>
            <a href="{{ route('vcard11.blog') }}" class="nav-link {{ Request::is('vcard11/blog*') ? 'active' : '' }}"><i
                        class="fa-solid fa-book me-3"></i>Blog</a>
            <a href="{{ route('vcard11.resume') }}"
               class="nav-link {{ Request::is('vcard11/privacy-policy*') ? 'active' : '' }}"><i
                        class="fa-solid fa-file-lines me-3"></i>Privacy Policy</a>
            <a href="{{ route('vcard11.portfolio') }}"
               class="nav-link {{ Request::is('vcard11/term-condition') ? 'active' : '' }}"><i
                        class="fa-solid fa-images me-2"></i> Terms & Conditions</a>
            {{--            <a href="#!" class="nav-link border-0   " onclick="openbars()"--}}
            {{--               id="v-nav-tab"><i--}}
            {{--                        class="fa-solid fa-layer-group me-3"></i>Pages<i class="fa-solid fa-plus text-end"></i></a>--}}
        </div>
        {{--        <div class="nav nav-tabs" id="pages-menu" role="tablist">--}}
        {{--            <a href="#!" class="nav-link active" onclick="closebars()"><i class="fa-solid fa-chevron-left"></i></a>--}}
        {{--            <a href="{{ route('vcard11.portfolio-single') }}"--}}
        {{--               class="nav-link {{ Request::is('vcard11/portfolio-single') ? 'active' : '' }}"><i--}}
        {{--                        class="fa-regular fa-file-lines me-3"></i>Portfolio Single</a>--}}
        {{--            <a href="{{ route('vcard11.portfolio-single-2') }}"--}}
        {{--               class="nav-link {{ Request::is('vcard11/portfolio-single-2*') ? 'active' : '' }}"><i--}}
        {{--                        class="fa-solid fa-images me-3"></i>Portfolio--}}
        {{--                Single 2</a>--}}
        {{--            <a href="{{ route('vcard11.blog-single') }}"--}}
        {{--               class="nav-link {{ Request::is('vcard11/blog-single*') ? 'active' : '' }}"><i--}}
        {{--                        class="fa-solid fa-envelope me-3"></i>Blog--}}
        {{--                Single</a>--}}

        {{--        </div>--}}
        <div class="row justify-content-center mt-4">
            <div class="col-12 text-center">
                <a class="btn btn-primary fs-14"><i class="fas fa-download"></i> Download VCard</a>
            </div>
        </div>
    </div>
</header>

