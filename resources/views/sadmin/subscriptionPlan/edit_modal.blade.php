<div class="modal fade" tabindex="-1" role="dialog" id="editSubscriptionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{__('messages.edit_subscription')}}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id' => 'editSubscriptionForm']) }}
            {{ Form::text('id',null,['hidden']) }}
            <div class="modal-body">
                {{ Form::hidden('id',null,['id'=>'SubscriptionId']) }}
                <div>
                        {{ Form::label('End date',__('messages.subscription.end_date').':', ['class' => 'form-label']) }}
                        {{ Form::text('end_date', null, ['class' => 'form-control bg-white', 'required', 'id'=>'EndDate', 'autocomplete' =>'off']) }}
                </div>
                <p class="text-danger" id="UnlimitedNote"></p>
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
