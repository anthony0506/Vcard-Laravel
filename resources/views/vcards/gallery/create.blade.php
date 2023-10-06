<div class="modal fade" id="addGalleryModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">{{ __('messages.vcard.new_gallery') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'addGalleryForm', 'files' => 'true']) !!}
                <div class="row">
                    <div class="col-sm-12 mb-5">
                        {{ Form::hidden('vcard_id', $vcard->id) }}
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label
                                class="form-label required fs-6 fw-bolder text-gray-700">{{ __('messages.gallery.type').':' }}</label>
                        </div>
                        {{ Form::select('type', \App\Models\Gallery::TYPE,null,
                            ['class' => 'form-control form-select form-select-solid fw-bold', 'required','data-dropdown-parent' => '#addGalleryModal','placeholder'=>'Select Type', 'data-control' => 'select2','id'=>'typeId']) }}
                    </div>
                    <div class="col-sm-12 mb-5 mt-3 image_link">

                        <div class="mb-3" io-image-input="true">
                            <label for="addGalleryPreview"
                                   class="form-label">{{ __('messages.gallery.gallery_name')}}</label>
                            <div class="d-block">
                                <div class="image-picker">  
                                    <div class="image previewImage" id="addGalleryPreview"
                                         style="background-image: url('{{ asset('assets/images/default_service.png') }}')"></div>
                                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                          data-placement="top" data-bs-original-title="{{__('messages.tooltip.image')}}">
                                        <label> 
                                            <i class="fa-solid fa-pen" id="profileImageIcon"></i> 
                                            <input type="file" id="addImage" name="image"
                                                   class="image-upload d-none" accept="image/*"/> </label> 
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-7 d-none youtube_link">
                    {{ Form::label('link', __('messages.gallery.youtube').':', ['class' => 'form-label fs-6 fw-bolder required text-gray-700 mb-3']) }}
                    {{ Form::url('link', null, ['class' => 'form-control', 'placeholder' => 'https://www.youtube.com/watch?v=hAGbufevHM4','id'=>'linkRequired']) }}
                </div>

                <div class="col-lg-12 mb-7 d-none file_upload_button">
                    <div class="form-group mt-2 d-flex flex-wrap">
                        <div class="mt-2 user__upload-btn w-auto me-sm-4 me-2">
                            <label class="btn btn-primary">
                                {{ __('messages.common.upload_file') }}
                                <input id="galleryUploadFile" class="d-none" accept=".xlsx, .xls, .csv, .pdf" name="gallery_upload_file" type="file">
                            </label>
                        </div>
                        <p id="createUploadFileName" class="mt-5 text-primary" ></p>
                    </div>
                </div>
                
                <div class="d-flex">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary me-3','id'=>'GallerySave']) }}
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('messages.common.discard') }}</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

