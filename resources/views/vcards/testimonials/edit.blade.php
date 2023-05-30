<div class="modal fade" id="editTestimonialModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">{{ __('messages.vcard.edit_testimonial') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'editTestimonialForm', 'files' => 'true']) !!}
                <div class="row">
                    <div class="col-sm-12 mb-5">
                        {{ Form::hidden('testimonial_id', null,['id' => 'testimonialId']) }}
                        {{ Form::label('name',__('messages.common.name').(':'), ['class' => 'form-label required']) }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'editName', 'required', 'placeholder' => __('messages.form.testimonial')]) }}
                    </div>
                    <div class="col-sm-12 mb-5">
                        {{ Form::label('description', __('messages.common.description').':', ['class' => 'form-label required']) }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'editDescription', 'placeholder' => __('messages.form.short_description'), 'rows' => '5' , 'required']) }}
                    </div>
                    <div class="col-sm-12 mb-5">

                        <div class="mb-3" io-image-input="true">
                            <label for="editTestimonialPreview"
                                   class="form-label required">{{ __('messages.vcard.image').':' }}</label>
                            <div class="d-block">
                                <div class="image-picker">
                                    <div class="image previewImage" id="editTestimonialPreview"
                                         style="background-image: url('{{ asset('web/media/avatars/150-26.jpg') }}')"></div>
                                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                          data-placement="top" data-bs-original-title="{{__('messages.tooltip.image')}}">
                                        <label> 
                                            <i class="fa-solid fa-pen" id="profileImageIcon"></i> 
                                            <input type="file" id="editTestimonialImg" name="image"
                                                   class="image-upload d-none" accept="image/*"/> </label> 
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pt-0">
                        {{ Form::button(__('messages.common.save'),['class' => 'btn btn-primary m-0','id' => 'testimonialUpdate','type'=>'submit']) }}
                        {{ Form::button(__('messages.common.discard'),['class' => 'btn btn-secondary my-0 ms-5 me-0','data-bs-dismiss' => 'modal']) }}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
