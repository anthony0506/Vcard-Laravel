<div id="addCityModal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.city.new_city') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'addCityForm']) }}
            <div class="modal-body">
                <div class="mb-5">
                    {{ Form::label('name',__('messages.common.name').':', ['class' => 'form-label required']) }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'required', 'autocomplete' =>'off']) }}
                </div>
                <div>
                    {{ Form::label('state_id',__('messages.city.state_name').':', ['class' => 'form-label required']) }}
                    {{ Form::select('state_id', getState(), null, ['id' => 'StateCity', 'class' => 'form-select','required', 'placeholder'=>__("messages.form.select_state"), 'data-control' => 'select2', 'data-dropdown-parent' => '#addCityModal']) }}
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
