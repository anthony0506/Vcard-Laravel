<div class="modal fade" tabindex="-1" role="dialog" id="editStateModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.state.edit_state') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id' => 'editStateForm']) }}
            <div class="modal-body">
                {{ Form::hidden('stateId',null,['id'=>'stateId']) }}
                    <div class="mb-5">
                        {{ Form::label('name',__('messages.common.name').':', ['class' => 'form-label required']) }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'required', 'id'=>'editName', 'autocomplete' =>'off']) }}
                    </div>
                    <div>
                        {{ Form::label('country_id',__('messages.state.country_name').':', ['class' => 'form-label required ']) }}
                        {{ Form::select('country_id', getCountry(), null, ['class' => 'form-select','required', 'placeholder'=> __("messages.form.select_country"), 'data-control' => 'select2', 'data-dropdown-parent' => '#editStateModal', 'id' => 'editCountryId']) }}
                    </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary m-0']) }}
                <button type="button" class="btn btn-secondary my-0 ms-5 me-0"
                        data-bs-dismiss="modal">{{ __('messages.common.discard') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
