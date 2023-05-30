<div class="modal fade" id="addProductModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">{{ __('messages.vcard.new_product') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {!! Form::open(['id'=>'addProductForm', 'files' => 'true']) !!}
            <div class="modal-body">
                <div class="row mb-5">
                    <div class="mb-5 col-lg-6">
                        {{ Form::hidden('vcard_id', $vcard->id) }}
                        {{ Form::label('name',__('messages.common.name').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('name', null, ['class' => 'form-control','required', 'placeholder' => __('messages.form.product')]) }}
                    </div>
                    <div class="mb-5 col-lg-6">
                        {{ Form::label('currency_id',__('messages.plan.currency').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::select('currency_id', getCurrencies(), null, ['id'=>'vcardProduct','class' => 'form-select form-select-solid fw-bold ', 'placeholder'=>__('messages.form.select_currency'), 'data-control' => 'select2', 'data-dropdown-parent' =>   '#addProductModal']) }}
                    </div>
                    <div class="mb-5 col-lg-6">
                        {{ Form::label('price', __('messages.common.price').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('price', null, ['class' => 'form-control', 'min'=>'0', 'placeholder' => __('messages.form.price')]) }}
                    </div>
                    <div class="mb-5 col-lg-6">
                        <div class="row">
                            <div class="col-sm-12">
                                {{ Form::label('product_url', __('messages.common.product_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                                {!! Form::text('product_url', null, ['class' => 'form-control', 'placeholder' => __('messages.form.product_url')]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="mb-5 col-lg-6">
                        {{ Form::label('description', __('messages.common.description').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('messages.form.short_description'), 'rows' => '5' , 'required']) }}
                    </div>
                    <div class="mb-5 col-lg-6">
                        <div class="mb-3" io-image-input="true">
                            <label for="productPreview"
                                   class="form-label required">{{ __('messages.vcard.product_icon').':' }}</label>
                            <span data-bs-toggle="tooltip"
                                  data-placement="top"
                                  data-bs-original-title="{{__('messages.tooltip.product_image')}}">
                                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" ></i>
                        </span>
                            <div class="d-block">
                                <div class="image-picker">
                                    <div class="image previewImage" id="productPreview"
                                         style="background-image: url('{{ asset('assets/images/default_service.png') }}')"></div>
                                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                          data-placement="top" data-bs-original-title="{{__('messages.tooltip.image')}}">
                                        <label>
                                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                            <input type="file" id="productIcon" name="product_icon"
                                                   class="image-upload d-none" accept="image/*"/> </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'),['class' => 'btn btn-primary m-0','id' => 'productSave','type'=>'submit']) }}
                {{ Form::button(__('messages.common.discard'),['class' => 'btn btn-secondary my-0 ms-5 me-0','data-bs-dismiss' => 'modal']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
