<div class="modal fade" id="editServiceModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">{{ __('messages.vcard.edit_service') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'editServiceForm', 'files' => 'true']) !!}
                <div class="row">
                    <div class="col-sm-12 mb-5">
                        {{ Form::hidden('service_id', null,['id' => 'serviceId']) }}
                        {{ Form::label('name',__('messages.common.name').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'editName', 'required', 'placeholder' => __('messages.form.service')]) }}
                    </div>
                    <div class="mb-5">
                        {{ Form::label('service_url', __('messages.common.service_url').':', ['class' => 'form-label']) }}
                        {{ Form::text('service_url', null, ['class' => 'form-control', 'id' => 'editServiceURL', 'placeholder' => __('messages.form.service_url')]) }}
                    </div>
                    <div class="col-sm-12 mb-5">
                        {{ Form::label('description', __('messages.common.description').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'editDescription', 'placeholder' =>__('messages.form.short_description'), 'rows' => '5' , 'required']) }}
                    </div>
                    <div class="col-sm-12 mb-5">

                        <div class="mb-3" io-image-input="true">
                            <label for="editServicePreview"
                                   class="form-label required">{{ __('messages.vcard.service_icon').':' }}</label>
                            <div class="d-block">
                                <div class="image-picker">
                                    <div class="image previewImage" id="editServicePreview"
                                         style="background-image: url({{ asset('assets/images/default_service.png') }})"></div>
                                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                          data-placement="top" data-bs-original-title="{{__('messages.tooltip.image')}}">
                                        <label>
                                        <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                            <input type="file" id="editServiceIcon" name="service_icon"
                                                   class="image-upload d-none" accept="image/*"/>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary me-3','id'=>'serviceUpdate']) }}
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ __('messages.common.discard') }}</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
