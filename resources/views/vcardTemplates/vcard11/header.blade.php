<!-- start top-header-section -->
<div class="top-header px-sm-4 px-3 py-3">
    <div class="row ps-lg-0 ps-5 align-items-center">
        <div class=" col-lg-3 col-sm-5 col-7 ps-lg-0 ps-sm-4 ps-3">
            <a href="{{ route('vcard.show',request()->alias) }}" class="fs-14 text-white  home"><i
                        class="fa-solid fa-house me-sm-3 me-2"></i></a> <span
                    class="fs-14 text-white home">@yield('page_name')</span>
        </div>
        <div class=" col-lg-9  col-sm-7 col-5 text-end d-flex justify-content-end align-items-center">
            <a href="{{ route('vcard.show.contact',request()->alias) }}"
               class="fs-14 text-white me-4 contact d-sm-inline-block d-none"><i
                        class="far fa-envelope me-2"></i> {{__('messages.vcard_11.get_in_touch')}}</a>
            @if(!empty($userSetting['enable_affiliation']))
                <button type="button"
                        class="sharedropbtn btn btn-primary d-xl-inline-block fs-14 ms-sm-4 copy-clipboard copy-referral-btn "
                        data-id="{{ $vcard->user->affiliate_code }}">
                    <a class="text-white text-decoration-none">
                        <i class="text-white fa-regular fa-copy me-2 vcard11-referral-icon"></i><span
                                class="vcard11-referral-text">{{ __('messages.vcard.copy_referral_link') }}</span>
                    </a>
                </button>
            @endif
            @if($vcard->language_enable == \App\Models\Vcard::LANGUAGE_ENABLE)
                <div class="dropdown">
                    <button class="dropbtn btn btn-primary d-xl-none d-block fs-14 ms-sm-4 ms-3"><i
                                class="fa-solid fa-language "></i></button>
                    <button class="dropbtn btn btn-primary d-xl-block d-none fs-14 ms-sm-4 ms-3 "><i
                                class="fa-solid fa-language me-2"></i>{{__('messages.language')}}<i
                                class="ps-1 fa-solid fa-sort-down"></i>
                    </button>
                    <div id="myDropdown" class="dropdown-content text-start">
                        @foreach(getAllLanguage() as $key => $language)
                            <a href="javascript:void(0)"
                               class="nav-link d-flex align-items-center {{ getLanguageIsoCode($vcard->default_language) == $key ? 'active' : '' }}"
                               data-name="{{ $key }}" id="languageName">
                                @if(array_key_exists($key,\App\Models\User::FLAG))
                                    @foreach(\App\Models\User::FLAG as $imageKey=> $imageValue)
                                        @if($imageKey == $key)
                                            <img src="{{asset($imageValue)}}" class="me-3">
                                        @endif
                                    @endforeach
                                @else
                                    <i class="fa fa-flag fa-xl me-3 text-danger" aria-hidden="true"></i>
                                @endif
                                {{ $language }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
            @php
                $shareUrl = route('vcard.show', ['alias' => $vcard->url_alias]);
            @endphp
            <div class="sharedropdown">
                <button class="sharedropbtn btn btn-primary d-lg-inline-block d-none fs-14 ms-sm-4 "><i
                            class="fas fa-share-alt me-2"></i>{{__('messages.vcard.share')}}</button>
                <a class="sharedropbtn btn btn-primary share d-lg-none d-lg-inline-block ms-sm-4 ms-3 ">
                    <i class="fas fa-share-alt text-white"></i>
                </a>
                <div id="shareDropdown" class="sharedropdown-content">
                    <div class="icons d-flex justify-content-between">
                        <div class="share-icon border-gradient border-gradient-orange d-flex justify-content-center align-items-center me-2">
                            <a href="http://www.facebook.com/sharer.php?u={{$shareUrl}}" target="_blank"><i
                                        class="fa-brands fa-facebook-f d-flex justify-content-center align-items-center"></i></a>
                        </div>
                        <div class="share-icon border-gradient border-gradient-orange me-2 d-flex justify-content-center align-items-center">
                            <a href="http://twitter.com/share?url={{$shareUrl}}&text={{$vcard->name}}&hashtags=sharebuttons"
                               target="_blank"><i
                                        class="fa-brands fa-twitter d-flex justify-content-center align-items-center"></i></a>
                        </div>
                        <div class="share-icon border-gradient border-gradient-orange me-2  d-flex justify-content-center align-items-center">
                            <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url={{$shareUrl}}"><i
                                        class="fa-brands fa-linkedin  d-flex justify-content-center align-items-center"
                                        target="_blank"></i></a>
                        </div>
                        <div class="share-icon border-gradient border-gradient-orange me-2  d-flex justify-content-center align-items-center"
                             target="_blank">
                            <a href="mailto:?Subject=&Body={{$shareUrl}}"><i
                                        class="fa-brands fa-solid fa-envelope d-flex justify-content-center align-items-center"
                                        target="_blank"></i></a>
                        </div>
                        <div class="share-icon border-gradient border-gradient-orange me-2  d-flex justify-content-center align-items-center">
                            <a href="http://pinterest.com/pin/create/link/?url={{$shareUrl}}" target="_blank"><i
                                        class="fa-brands fa-pinterest-p d-flex justify-content-center align-items-center"></i></a>
                        </div>
                        <div class="share-icon border-gradient border-gradient-orange me-2  d-flex justify-content-center align-items-center">
                            <a href="http://reddit.com/submit?url={{$shareUrl}}&title={{$vcard->name}}" target="_blank"><i
                                        class="fa-brands fa-reddit d-flex justify-content-center align-items-center"></i></a>
                        </div>
                        <div class="share-icon border-gradient border-gradient-orange me-2  d-flex justify-content-center align-items-center">
                            <a href="https://wa.me/?text={{$shareUrl}}" target="_blank"><i
                                        class="fa-brands fa-whatsapp d-flex justify-content-center align-items-center"
                                        ></i></a>
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
                <img src="{{ $vcard->profile_url }}"
                     class="w-100 h-100 object-fit-cover br-15  custom-border-radius">
                @if(checkFeature('social_links') && $vcard->socialLink)
                    <div class=" d-flex icon-box position-absolute">
                        <div class="social-icon  me-3 border-gradient border-gradient-orange d-flex justify-content-center align-items-center">
                            <a href="{{$vcard->socialLink->facebook}}"><i
                                        class="fa-brands fa-facebook-f d-flex justify-content-center align-items-center"></i></a>
                        </div>
                        <div class="social-icon me-3 d-flex justify-content-center align-items-center">
                            <a href="{{ $vcard->socialLink->instagram }}"><i
                                        class="fa-brands fa-instagram d-flex justify-content-center align-items-center"></i></a>
                        </div>
                        <div class="social-icon me-3 d-flex justify-content-center align-items-center">
                            <a href="{{ $vcard->socialLink->twitter }}"><i
                                        class="fa-brands fa-twitter d-flex justify-content-center align-items-center"></i></a>
                        </div>
                        <div class="social-icon me-3 d-flex justify-content-center align-items-center">
                            <a href="{{ $vcard->socialLink->pinterest }}"> <i
                                        class="fa-brands fa-pinterest-p d-flex justify-content-center align-items-center"></i>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="">
                <div class="nav-tabs nav flex-column nav-pills me-3" id="v-pills-tab1" role="tablist"
                     aria-orientation="vertical">
                    <a href="{{ route('vcard.show',$vcard->url_alias) }}"
                       class="nav-link {{ Request::is($vcard->url_alias) ? 'active' : '' }}"><i
                                class="fa-solid fa-house me-3"></i>{{__('auth.home')}}</a>
                    {{--                    <a href="{{ route('vcard.show.resume',$vcard->url_alias) }}"--}}
                    {{--                       class="nav-link {{ Request::is($vcard->url_alias.'/resume*') ? 'active' : '' }}"><i--}}
                    {{--                                class="fa-solid fa-file-lines me-3"></i>Resume</a>--}}

                    {{--                    <a href="{{ route('vcard.show.portfolio',$vcard->url_alias) }}"--}}
                    {{--                       class="nav-link {{ Request::is($vcard->url_alias.'/portfolio') ? 'active' : '' }}"><i--}}
                    {{--                                class="fa-solid fa-images me-3"></i>Portfolio</a>--}}
                    <a href="{{ route('vcard.show.contact',$vcard->url_alias) }}"
                       class="nav-link {{ Request::is($vcard->url_alias.'/contact*') ? 'active' : '' }}"><i
                                class="fa-solid fa-envelope me-3"></i>{{__('auth.contact')}}</a>
                    @if($vcard->blogs->count())
                        <a href="{{ route('vcard.show.blog',$vcard->url_alias) }}"
                           class="nav-link {{ Request::is($vcard->url_alias.'/blog*') ? 'active' : '' }}"><i
                                    class="fa-solid fa-book me-3"></i>{{__('messages.feature.blog')}}
                        </a>                    @endif
                    @if(!empty($vcard->privacy_policy))
                        <a href="{{ route('vcard.show.privacy-policy',[$vcard->url_alias,$vcard->id]) }}"
                           class="nav-link {{ Request::is($vcard->url_alias.'/privacy-policies*') ? 'active' : '' }}">
                            <i class="fa fa-shield me-3" aria-hidden="true"></i>
                            {{__('messages.vcard.privacy_policy')}}</a>
                    @endif
                    @if(!empty($vcard->term_condition))
                        <a href="{{ route('vcard.show.term-condition',[$vcard->url_alias,$vcard->id]) }}"
                           class="nav-link {{ Request::is($vcard->url_alias.'/term-condition*') ? 'active' : '' }}">
                            <i class="fas fa-file-contract me-3"></i>
                            {!! __('messages.vcard.term-condition')!!}</a>
                    @endif
                    {{--                        <a href="#!" class="nav-link border-0" onclick="openbars1()" id="v-nav-tab"><i--}}
                    {{--                                    class="fa-solid fa-layer-group me-3"></i>Pages<i--}}
                    {{--                                    class="fa-solid fa-plus text-end"></i></a>--}}
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
            <div class="row justify-content-center mt-3">
                <div class="col-12 text-center">
                    <a onclick="downloadVcard('{{ $vcard->name }}.vcf',{{ $vcard->id }})" class="btn btn-primary"><i
                                class="fas fa-download"></i> {{__('messages.vcard.download_vcard')}}</a>
                </div>
            </div>
        </header>
    </div>
</div>
<!-- end offcanvas-section -->

<header class="main-header p-4 d-lg-block d-none">
    <div class="hero-img position-relative br-15 mb-15">
        <img src="{{ $vcard->profile_url }}" class="w-100 custom-border-radius h-100 object-fit-cover br-15">
    </div>
    @if(checkFeature('social_links') && $vcard->socialLink)
        <div class=" d-flex icon-box justify-content-center flex-wrap custom-social-position mt-3">
            @if($vcard->socialLink->facebook)
                <div class="social-icon mb-2 me-2 border-gradient border-gradient-orange d-flex justify-content-center align-items-center">
                    <a href="{{$vcard->socialLink->facebook}}" target="_blank"><i
                                class="fa-brands fa-facebook-f d-flex justify-content-center align-items-center"></i></a>
                </div>
            @endif
            @if($vcard->socialLink->instagram)
                <div class="social-icon me-2 d-flex justify-content-center align-items-center">
                    <a href="{{ $vcard->socialLink->instagram }}" target="_blank"><i
                            class="fa-brands fa-instagram d-flex justify-content-center align-items-center"></i></a>
                </div>
            @endif
            @if($vcard->socialLink->twitter)
                <div class="social-icon me-2 d-flex justify-content-center align-items-center">
                    <a href="{{ $vcard->socialLink->twitter }}" target="_blank"><i
                            class="fa-brands fa-twitter d-flex justify-content-center align-items-center"></i></a>
                </div>
            @endif
            @if($vcard->socialLink->pinterest)
                <div class="social-icon me-2 d-flex justify-content-center align-items-center">
                    <a href="{{ $vcard->socialLink->pinterest }}" target="_blank"> <i
                            class="fa-brands fa-pinterest-p d-flex justify-content-center align-items-center"></i>
                    </a>
                </div>
            @endif
            @if($vcard->socialLink->reddit)
                <div class="social-icon me-2 d-flex justify-content-center align-items-center">
                    <a href="{{ $vcard->socialLink->reddit }}" target="_blank"> <i
                            class="fa-brands fa-reddit d-flex justify-content-center align-items-center"></i>
                    </a>
                </div>
            @endif
            @if($vcard->socialLink->youtube)
                <div class="social-icon me-2  mb-2  d-flex justify-content-center align-items-center">
                    <a href="{{ $vcard->socialLink->youtube }}" target="_blank"> <i
                            class="fa-brands fa-youtube d-flex justify-content-center align-items-center"></i>
                    </a>
                </div>
            @endif
            @if($vcard->socialLink->tumblr)
                <div class="social-icon me-2 d-flex justify-content-center align-items-center">
                    <a href="{{ $vcard->socialLink->tumblr }}" target="_blank"> <i
                            class="fa-brands fa-tumblr d-flex justify-content-center align-items-center"></i>
                    </a>
                </div>
            @endif
            @if($vcard->socialLink->linkedin)
                <div class="social-icon me-2 d-flex justify-content-center align-items-center">
                    <a href="{{ $vcard->socialLink->linkedin }}" target="_blank"> <i
                            class="fa-brands fa-linkedin d-flex justify-content-center align-items-center"></i>
                    </a>
                </div>
            @endif
            @if($vcard->socialLink->whatsapp)
                <div class="social-icon me-2 d-flex justify-content-center align-items-center">
                    <a href="{{ $vcard->socialLink->whatsapp }}" target="_blank"> <i
                            class="fa-brands fa-whatsapp d-flex justify-content-center align-items-center"></i>
                    </a>
                </div>
            @endif
            @if($vcard->socialLink->tiktok)
                <div class="social-icon me-2 d-flex justify-content-center align-items-center">
                    <a href="{{ $vcard->socialLink->tiktok }}" target="_blank"> <i
                            class="fa-brands fa-tiktok d-flex justify-content-center align-items-center"></i>
                    </a>
                </div>
            @endif
            @if($vcard->socialLink->website)
                <div class="social-icon me-2 d-flex justify-content-center align-items-center">
                    <a href="{{ $vcard->socialLink->website }}" target="_blank"> <i
                            class="fa-brands fa-solid fa-globe  d-flex  justify-content-center align-items-center"
                            aria-hidden="true"></i>
                    </a>
                </div>
            @endif
        </div>
    @endif
    <div class="nav-tabs nav flex-column nav-pills mb-7 mt-3" id="v-pills-tab" role="tablist"
         aria-orientation="vertical">
        <a href="{{ route('vcard.show',$vcard->url_alias) }}"
           class="nav-link {{ Request::is($vcard->url_alias) ? 'active' : '' }}"><i
                    class="fa-solid fa-house me-3"></i>{{__('auth.home')}}</a>
            <a href="{{ route('vcard.show.contact',$vcard->url_alias) }}"
               class="nav-link {{ Request::is($vcard->url_alias.'/contact*') ? 'active' : '' }}"><i
                        class="fa-solid fa-envelope me-3"></i>{{__('auth.contact')}}</a>
            @if($vcard->blogs->count())
                <a href="{{ route('vcard.show.blog',$vcard->url_alias) }}"
                   class="nav-link {{ Request::is($vcard->url_alias.'/blog*') ? 'active' : '' }}"><i
                            class="fa-solid fa-book me-3"></i>{{__('messages.feature.blog')}}</a>
            @endif
            @if(!empty($vcard->privacy_policy))
                <a href="{{ route('vcard.show.privacy-policy',[$vcard->url_alias,$vcard->id]) }}"
                   class="nav-link {{ Request::is($vcard->url_alias.'/privacy-policies*') ? 'active' : '' }}">
                    <i class="fa fa-shield me-2" aria-hidden="true"></i>
                    {{__('messages.vcard.privacy_policy')}}</a>
            @endif
            @if(!empty($vcard->term_condition))
                <a href="{{ route('vcard.show.term-condition',[$vcard->url_alias,$vcard->id]) }}"
                   class="nav-link {{ Request::is($vcard->url_alias.'/term-condition*') ? 'active' : '' }}">
                    <i class="fas fa-file-contract me-2"></i>
                    {!! __('messages.vcard.term-condition')!!}</a>
            @endif
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-12 text-center">
                <a onclick="downloadVcard('{{ $vcard->name }}.vcf',{{ $vcard->id }})" class="btn btn-primary fs-14"><i
                            class="fas fa-download"></i> {{ __('messages.vcard.download_vcard') }}
                </a>
            </div>
        </div>
</header>

