@extends('layouts.app')
@section('title')
    {{__('messages.vcard.edit_vcard')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>{{__('messages.vcard.edit_vcard')}}</h1>
            <a class="btn btn-outline-primary float-end"
               href="{{ route('vcards.index') }}">{{ __('messages.common.back') }}</a>
        </div>
        <div class="col-12">
            @if(Session::has('success'))
                <p class="alert alert-success">{{ getSuccessMessage(Request::query('part')).Session::get('success') }}</p>
            @endif
            @include('layouts.errors')
            @include('flash::message')
        </div>
        @include('vcards.sub_menu')
        @if($partName !== 'services'&& $partName !=='products'&& $partName !=='testimonials' && $partName !=='gallery' && $partName !=='blogs')
            <div class="card">
                <div class="card-body">
                    @endif
                    {{ Form::hidden('is_true', Request::query('part') == 'business_hours',['id' => 'vcardCreateEditIsTrue']) }}
                    @if($partName != 'services' && $partName != 'blogs' && $partName != 'testimonials' && $partName != 'products' && $partName != 'gallery')
                        {!! Form::open(['route' => ['vcards.update', $vcard->id], 'id' => 'editForm', 'method' => 'put', 'files' => 'true']) !!}
                        @include('vcards.fields')
                        {{ Form::close() }}
                    @else
                        @if($partName === 'services')
                            @include('vcards.services.index')
                        @elseif($partName === 'products')
                            @include('vcards.products.index')
                        @elseif($partName === 'gallery')
                        <div class="d-sm-flex align-items-center w-100 mb-2">
                            <div class="mb-3 mb-sm-0">
                                <form class="d-flex position-relative">
                                    <div class="position-relative d-flex width-320">
                                                    
                                        <input class="form-control ps-8" id="galleryName" type="search" placeholder="Edit Gallery Name" aria-label="Search" value={{$galleryName}}>
                                    </div>
                                </form>
                            </div>
                            <a type="button" class="btn btn-primary ms-auto" id="saveGalleryName" onclick="onSaveGalleryName()">Save Gallery</a>
                
                            <div class="ms-0 ms-md-2 mb-3 mb-md-0">
                                    </div>
                            </div>

                            <script>
                                const onSaveGalleryName = () => {
                                
                                const vcardId = <?php echo $vcardId; ?>;
                                $.ajax({
                                    url: '/admin/vcards/updateGalleryName',
                                    type: 'Post',
                                    data: {
                                        'vcard_id' : vcardId,
                                        'galleryName' : document.getElementById('galleryName').value
                                    },
                                    success: function (result) {
                                        var res = JSON.parse(result)
                                        if (res.success) {
                                            alert('Updated successfully!');
                                        } else {
                                            alert('Failed');
                                        }
                                    },
                                    error: function (result) {
                                        
                                    },
                                })
                                }
                            </script>
            
                            @include('vcards.gallery.index')
                        @elseif($partName === 'blogs')
                            @include('vcards.blogs.index')
                        @else
                            @include('vcards.testimonials.index')
                        @endif
                    @endif
                    @if($partName !== 'services'&& $partName !=='products'&& $partName !=='testimonials' && $partName !=='gallery' && $partName !=='blogs')
                </div>
            </div>
        @endif
    </div>
@endsection

