<div class="modal fade" id="addServiceModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.vcard.new_service') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'addServiceForm', 'files' => 'true']) }}
            <div class="modal-body">
                <div class="mb-5">
                    {{ Form::hidden('vcard_id', $vcard->id) }}
                    {{ Form::label('name',__('messages.common.name').(':'), ['class' => 'form-label required']) }}
                    {{ Form::text('name', null, ['class' => 'form-control','required', 'placeholder' => __('messages.form.service')]) }}
                </div>
                <div class="mb-5">
                    {{ Form::label('service_url', __('messages.common.service_url').':', ['class' => 'form-label']) }}
                    {{ Form::text('service_url', null, ['class' => 'form-control', 'placeholder' => __('messages.form.service_url')]) }}
                </div>
                <div class="mb-5">
                    {{ Form::label('description', __('messages.common.description').':', ['class' => 'form-label required']) }}
                    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('messages.form.short_description'), 'rows' => '5' , 'required']) }}
                </div>
                <div class="mb-3" io-image-input="true">
                    <label for="exampleInputImage"
                           class="form-label required">{{ __('messages.vcard.service_icon').':' }}</label>
                    <div class="d-block">
                        <div class="image-picker">
                            <div class="image previewImage" id="servicePreview"
                                 style="background-image: url({{ asset('assets/images/default_service.png') }})"></div>
                            <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                  data-placement="top" data-bs-original-title="{{__('messages.tooltip.image')}}">
                                        <label>
                                        <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                            <input type="file" id="serviceIcon" name="service_icon"
                                                   class="image-upload d-none" accept="image/*"/>
                                        </label>
                                    </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary m-0','id'=>'serviceSave']) }}
                <button type="button" class="btn btn-secondary my-0 ms-5 me-0"
                        data-bs-dismiss="modal">{{ __('messages.common.discard') }}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
