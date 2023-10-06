<html lang="en">
<head>
    <link>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>vcard</title>

    {{--css link--}}
    <link rel="stylesheet" href="{{ asset('assets/css/vcard1.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css')}}">

    {{--font-awesome--}}
    <link href="{{ asset('backend/css/all.min.css') }}" rel="stylesheet">

    {{--google font--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
<div class="container">
    <div class="vcard-one main-content w-100 mx-auto  
    @if($blog->vcard->template_id == 1)
            vcard-one-bg
    @elseif($blog->vcard->template_id == 2)
            vcard-two-bg
    @elseif($blog->vcard->template_id == 3)
            vcard-three-bg
    @elseif($blog->vcard->template_id == 4)
            vcard-four-bg
    @elseif($blog->vcard->template_id == 5)
            vcard-five-bg
    @elseif($blog->vcard->template_id == 6)
            vcard-six-bg
    @elseif($blog->vcard->template_id == 7)
            vcard-seven-bg
    @elseif($blog->vcard->template_id == 8)
            vcard-eight-bg
    @elseif($blog->vcard->template_id == 9)
            vcard-nine-bg
    @elseif($blog->vcard->template_id == 10)
            vcard-ten-bg
    @endif">
        <div class="vcard-one-main-section p-3">
            <div class="d-flex justify-content-between align-items-center py-3">
                <h2 class="blog-title 
             @if($blog->vcard->template_id == 1)
                        vcard-one-title 
            @elseif($blog->vcard->template_id == 2)
                        vcard-two-title 
@elseif($blog->vcard->template_id == 3)
                        vcard-three-title 
@elseif($blog->vcard->template_id == 4)
                        vcard-four-title 
@elseif($blog->vcard->template_id == 5)
                        vcard-five-title 
@elseif($blog->vcard->template_id == 6)
                        vcard-six-title 
@elseif($blog->vcard->template_id == 7)
                        vcard-seven-title 
@elseif($blog->vcard->template_id == 8)
                        vcard-eight-title 
@elseif($blog->vcard->template_id == 9)
                        vcard-nine-title 
@elseif($blog->vcard->template_id == 10)
                        vcard-ten-title 
@endif">{{$blog->title}}</h2>
                <div class="blog-hover-btn">
                    <a class="btn 
                    @if($blog->vcard->template_id == 1)
                            vcard-one-back
                    @elseif($blog->vcard->template_id == 2)
                            vcard-two-back 
                    @elseif($blog->vcard->template_id == 3)
                            vcard-three-back 
                    @elseif($blog->vcard->template_id == 4)
                            vcard-four-back 
                    @elseif($blog->vcard->template_id == 5)
                            vcard-five-back 
                    @elseif($blog->vcard->template_id == 6)
                            vcard-six-back 
                    @elseif($blog->vcard->template_id == 7)
                            vcard-seven-back 
                    @elseif($blog->vcard->template_id == 8)
                            vcard-eight-back 
                    @elseif($blog->vcard->template_id == 9)
                            vcard-nine-back 
                    @elseif($blog->vcard->template_id == 10)
                            vcard-ten-back 
                    @endif" href="{{ url()->previous() }}" role="button">
                        {{__('messages.common.back')}}
                    </a>
                </div>
            </div>

            <div class="img-bx  
            @if($blog->vcard->template_id == 1)
                    vcard-one-img-bx 
            @elseif($blog->vcard->template_id == 2)
                    vcard-two-img-bx
            @elseif($blog->vcard->template_id == 3)
                    vcard-three-img-bx
            @elseif($blog->vcard->template_id == 4)
                    vcard-four-img-bx
            @elseif($blog->vcard->template_id == 5)
                    vcard-five-img-bx
            @elseif($blog->vcard->template_id == 6)
                    vcard-six-img-bx
            @elseif($blog->vcard->template_id == 7)
                    vcard-seven-img-bx
            @elseif($blog->vcard->template_id == 8)
                    vcard-eight-img-bx
            @elseif($blog->vcard->template_id == 9)
                    vcard-nine-img-bx 
            @elseif($blog->vcard->template_id == 10)
                    vcard-ten-img-bx
            @endif">
                <img src="{{$blog->blog_icon}}"/>
            </div>
            <div class="details mt-4">
                <p class="fw-light">{!! $blog->description !!}</p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('backend/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
