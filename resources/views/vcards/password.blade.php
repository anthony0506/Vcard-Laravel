<div id="passwordModal" class="modal fade" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.vcard.enter_password') }}</h5>
            </div>
            {{ Form::open(['id'=>'passwordForm']) }}
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-danger d-none" id="passwordError">
                        </div>
                        {{ Form::password('password', ['class' => 'form-control input-box', 'required', 'autocomplete' =>'off', 'id' => 'password', 'placeholder' => __('messages.user.password')]) }}
                    </div>
                </div>
                <div class="text-center">
                    {{ Form::button(__('messages.common.ok'), ['type'=>'submit','class' => 'btn btn-primary submit-btn']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
