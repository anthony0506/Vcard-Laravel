<div id="addStateModal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.state.new_state') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'addStateForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger fs-4 text-white d-flex align-items-center  d-none" role="alert" id="stateValidationErrorsBox">
                    <i class="fa-solid fa-face-frown me-5"></i>
                </div>
                    <div class="mb-5">
                        {{ Form::label('name',__('messages.common.name').':', ['class' => 'form-label required']) }}
                        {{ Form::text('name', null, ['class' => 'form-control','required', 'autocomplete' =>'off']) }}
                    </div>
                    <div>
                        {{ Form::label('country_id',__('messages.state.country_name').':', ['class' => 'form-label required']) }}
                        {{ Form::select('country_id', getCountry(), null, ['id' => 'countryState', 'class' => 'form-select','required', 'placeholder'=>__('messages.form.select_country'), 'data-control' => 'select2', 'data-dropdown-parent' => '#addStateModal']) }}
                    </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary m-0','id'=>'btnSave']) }}
                <button type="button" class="btn btn-secondary my-0 ms-5 me-0"
                        data-bs-dismiss="modal">{{ __('messages.common.discard') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
