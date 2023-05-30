<div class="modal fade" tabindex="-1" role="dialog" id="editCityModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.city.edit_city') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id' => 'editCityForm']) }}
            <div class="modal-body">
                {{ Form::hidden('cityId',null,['id'=>'cityId']) }}
                    <div class="mb-5">
                        {{ Form::label('name',__('messages.common.name').':', ['class' => 'form-label required']) }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'required', 'id'=>'editName', 'autocomplete' =>'off']) }}
                    </div>
                    <div>
                        {{ Form::label('state_id',__('messages.city.state_name').':', ['class' => 'form-label required']) }}
                        {{ Form::select('state_id', getState(), null, ['class' => 'form-select','required', 'placeholder'=>__("messages.form.select_state"), 'data-control' => 'select2', 'data-dropdown-parent' => '#editCityModal', 'id' => 'editStateId']) }}
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
