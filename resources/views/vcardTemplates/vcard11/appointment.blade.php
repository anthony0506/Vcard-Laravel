<div class="modal fade" id="AppointmentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">{{__('messages.make_appointment')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> {!! Form::open(['id'=>'addAppointmentForm']) !!}
            <div class="modal-body">
                <div class="alert alert-danger fs-4 text-white d-flex align-items-center d-none" role="alert"
                     id="countryValidationErrorsBox"><i class="fa-solid fa-face-frown me-5"></i>
                </div> {{ Form::hidden('from_time', null,['id'=>'timeSlot',]) }} {{ Form::hidden('to_time', null,['id'=>'toTime',]) }} {{ Form::hidden('date', null,['id'=>'Date',]) }} {{ Form::hidden('vcard_id', $vcard->id,['id'=>'vCardId',]) }}
                <div class="mb-3 form-group"> {{ Form::label('name',__('messages.common.name').(' :'), ['class' => 'form-label required']) }} {{ Form::text('name', null, ['class' => 'form-control custom-placeholder','required', 'placeholder' => __('messages.form.enter_name'),'id'=>'paypalIntUserName']) }} </div>
                <div class="mb-3"> {{ Form::label('email',__('messages.common.email').(' :'), ['class' => 'form-label required ']) }} {{ Form::text('email', null, ['class' => 'form-control custom-placeholder','required', 'placeholder' => __('messages.form.enter_email'),'id'=>'paypalIntUserEmail']) }} </div>
                <div class="mb-3"> {{ Form::label('phone',__('messages.common.phone').(' :'), ['class' => 'form-label']) }} {{ Form::text('phone', null, ['class' => 'form-control custom-placeholder', 'placeholder' => __('messages.form.enter_phone'),'id'=>'paypalIntUserPhone']) }} </div> @if(isset($appointmentDetail->is_paid) && ($appointmentDetail->is_paid == 1) && (getUserSettingValue('stripe_enable',$vcard->user->id) || getUserSettingValue('paypal_enable',$vcard->user->id)))
                    <div class="mb-3"> {{ Form::label('payment_method',__('messages.common.payment_methods').(' :'), ['class' => 'form-label required']) }} {{ Form::select('payment_method', $appointmentDetail->is_paid == 0 ? \App\Models\Appointment::PAYMENT_METHOD :$paymentMethod , null,['class' => 'form-control custom-placeholder  form-select form-select-solid select2Selector','data-control' => 'select2', 'required', 'id' => 'appointmentPaymentMethod','placeholder'=>__('messages.common.payment_methods')]) }} </div>
                    <div class="mt-3"> {{ Form::label('phone',__('Price').(':'), ['class' => 'form-label']) }} <span
                                class="form-label" id="paymentCurrencyCode">{{ getCurrencyAmount(number_format($appointmentDetail->price),$currency->currency_icon) }}</span> <input
                                type="hidden" id="currencyCode" name="currency_code"
                                value="{{ $currency->currency_code }}"> <input type="hidden" id="amount" name="amount"
                                                                               value="{{ $appointmentDetail->price }}">
                    </div> @endif </div>
            <div class="modal-footer"> {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary m-0','id'=>'serviceSave']) }}
                <button type="button" class="btn btn-secondary my-0 ms-3 me-0"
                        data-bs-dismiss="modal">{{ __('messages.common.discard') }}</button>
            </div> {{ Form::close() }} </div>
    </div>
</div>
