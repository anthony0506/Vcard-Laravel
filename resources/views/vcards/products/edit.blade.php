<div class="modal fade" id="editProductModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">{{ __('messages.vcard.edit_product') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {!! Form::open(['id'=>'editProductForm', 'files' => 'true']) !!}

            <div class="modal-body">
                <div class="row mb-5">
                    <div class="col-sm-12 mb-5 col-lg-6">
                        {{ Form::hidden('product_id', null,['id' => 'productId']) }}
                        {{ Form::label('name',__('messages.common.name').(':'), ['class' => 'form-label required']) }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'editName', 'required', 'placeholder' => __('messages.form.product')]) }}
                    </div>
                    <div class="col-sm-12 mb-5 col-lg-6">
                        {{ Form::label('currency_id',__('messages.plan.currency').':', ['class' => 'form-label']) }}
                        {{ Form::select('currency_id', getCurrencies(), null, ['class' => 'form-select form-select-solid fw-bold select2Selector', 'data-placeholder'=>__('messages.form.select_currency'), 'id' => 'editCurrencyId', 'data-control' => 'select2', 'data-dropdown-parent' => '#editProductModal']) }}
                    </div>
                    <div class="col-sm-12 mb-5 col-lg-6">
                        {{ Form::label('price',__('messages.common.price').(':'), ['class' => 'form-label']) }}
                        {{ Form::text('price', null, ['class' => 'form-control', 'id' => 'editPrice', 'placeholder' => __('messages.form.price')]) }}
                    </div>
                    <div class="col-sm-12 mb-5 col-lg-6">
                        <div class="row">
                            <div class="col-sm-12">
                                {{ Form::label('product_url', __('messages.common.product_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                                {!! Form::text('product_url', null, ['class' => 'form-control', 'id' => 'editProductUrl', 'placeholder' => __('messages.form.product_url')]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-5 col-lg-6">
                        {{ Form::label('description', __('messages.common.description').':', ['class' => 'form-label required']) }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'editDescription', 'placeholder' => __('messages.form.short_description'), 'rows' => '5' , 'required']) }}
                    </div>
                    <div class="col-sm-12 mb-5 col-lg-6">
                        <div class="mb-3" io-image-input="true">
                            <label for="editProductPreview"
                                   class="form-label required">{{ __('messages.vcard.product_icon').':' }}</label>
                            <div class="d-block">
                                <div class="image-picker">
                                    <div class="image previewImage" id="editProductPreview"
                                         style="background-image: url('{{ asset('assets/images/default_service.png') }}')"></div>
                                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                          data-placement="top" data-bs-original-title="{{__('messages.tooltip.image')}}">
                                        <label> 
                                            <i class="fa-solid fa-pen" id="profileImageIcon"></i> 
                                            <input type="file" id="editProductIcon" name="product_icon"
                                                   class="image-upload d-none" accept="image/*"/> </label> 
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary m-0','id' => 'productUpdateBtn']) }}
                {{ Form::button(__('messages.common.discard'),['class' => 'btn btn-secondary my-0 ms-5 me-0','data-bs-dismiss' => 'modal']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
