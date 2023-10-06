@extends('settings.edit')
@section('section')
    <div class="card">
        <div class="card-body">
            {{ Form::hidden('manual_payment_guide_data',$setting['manual_payment_guide'],['id' => 'manualPaymentGuideData']) }}
            {{ Form::hidden('is_manual_payment_guide_on_data',$setting['is_manual_payment_guide_on'],['id' => 'isManualPaymentGuideOnData']) }}
            {{ Form::open(['route' => ['setting.ManualPaymentGuides.update'], 'method' => 'post','id' =>'ManualPaymentGuides']) }}

            <div class="col-lg-12">
                <div class="mb-5">
                    {{ Form::label('manual_payment_guide', __('messages.vcard.manual_payment_guide').':', ['class' => 'form-label']) }}
                    <div id="manualPaymentGuideId" class="editor-height" style="height: 200px"></div>
                    {{ Form::hidden('manual_payment_guide', null, ['id' => 'guideData']) }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-5">
                    {{ Form::label('is_manual_payment_guide_on', __('messages.vcard.is_manual_payment').':', ['class' => 'form-label']) }}
                    <div class="form-check form-switch">
                        {{ Form::checkbox('is_manual_payment_guide_on', 1, $setting['is_manual_payment_guide_on'] == 1, ['class' => 'form-check-input']) }}
                    </div>
                </div>
            </div>

            {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection
