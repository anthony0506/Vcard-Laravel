@extends('settings.edit')
@section('section')
    <div class="card">
        <div class="card-body">
            {{ Form::hidden('terms_condition_data',$setting['terms_conditions'],['id' => 'termConditionData']) }}
            {{ Form::hidden('privacy_policy_data',$setting['privacy_policy'],['id' => 'privacyPolicyData']) }}
            {{ Form::open(['route' => ['setting.TermsConditions.update'], 'method' => 'post','id' =>'TermsConditions']) }}

            <div class="col-lg-12">
                <div class="mb-5">
                    {{ Form::label('term_condition', __('messages.vcard.term_condition').':', ['class' => 'form-label']) }}
                    <div id="termConditionId"  class="editor-height" style="height: 200px"></div>
                    {{ Form::hidden('terms_conditions', null, ['id' => 'termData']) }}
                </div>
            </di
            <div class="col-lg-12">
                <div class="mb-5">
                    {{ Form::label('privacy_policy', __('messages.vcard.privacy_policy').':', ['class' => 'form-label']) }}
                    <div id="privacyPolicyId" class="editor-height" style="height: 200px"></div>
                    {{ Form::hidden('privacy_policy', null, ['id' => 'privacyData']) }}
                </div>
            </div>
            
            {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection
