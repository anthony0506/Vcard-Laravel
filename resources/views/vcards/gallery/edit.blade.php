<div class="modal fade" id="editGalleryModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">{{ __('messages.vcard.edit_gallery') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'editGalleryForm', 'files' => 'true']) !!}
                <div class="row">
                    <div class="col-sm-12 mb-5">
                        {{ Form::hidden('gallery_id', null,['id' => 'galleryId']) }}
                    </div>
                    <div class="col-sm-12">
                        <label
                            class="form-label required fs-6 fw-bolder text-gray-700">{{ __('messages.gallery.type').':' }}</label>
                        {{ Form::select('type', \App\Models\Gallery::TYPE,\App\Models\Gallery::TYPE_IMAGE,
                            ['class' => 'form-select form-select-solid fw-bold', 'data-control' => 'select2', 'data-dropdown-parent' => '#editGalleryModal' ,'id'=>'editTypeId']) }}
                    </div>
                    <div class="col-sm-12 mb-5 mt-3 editImagelink">

                        <div class="mb-3" io-image-input="true">
                            <label for="editGalleryPreview"
                                   class="form-label">{{ __('messages.gallery.gallery_name').':' }}</label>
                            <div class="d-block">
                                <div class="image-picker">
                                    <div class="image previewImage" id="editGalleryPreview"
                                         style="background-image: url('{{ asset('assets/images/default_service.png') }}')"></div>
                                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                          data-placement="top" data-bs-original-title="{{__('messages.tooltip.image')}}">
                                        <label> 
                                            <i class="fa-solid fa-pen" id="profileImageIcon"></i> 
                                            <input type="file" id="editImage" name="image"
                                                   class="image-upload d-none" accept="image/*"/> </label> 
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-7 d-none editYouTubeLink">
                    {{ Form::label('link', __('messages.gallery.youtube').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                    {{ Form::url('link', null, ['class' => 'form-control', 'placeholder' => 'https://www.youtube.com/watch?v=hAGbufevHM4','id'=>'editYouTube_Link']) }}
                </div>

                <div class="col-lg-12 mb-7 d-none file_upload_button">
                    <div class="form-group mt-2 d-flex flex-wrap">
                        <div class="mt-2 user__upload-btn w-auto me-sm-4 me-2">
                            <label class="btn btn-primary">
                                {{ __('messages.common.upload_file') }}
                                <input id="editGalleryUploadFile" class="d-none" accept=".xlsx, .xls, .csv, .pdf" name="gallery_upload_file" type="file">
                            </label>
                        </div>
                        <p id="uploadFileName" class="mt-5 text-primary"></p>
                    </div>
                </div>
                <div class="d-flex">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary me-3','id'=>'editGallerySave']) }}
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('messages.common.discard') }}</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

