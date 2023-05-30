<div id="editLanguageModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('messages.languages.edit_language') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'editLanguageForm']) }}
            <div class="modal-body">
                {{ Form::hidden('languageId',null,['id'=>'languageId']) }}

                <div class="mb-5">
                    {{ Form::label('name',__('messages.languages.language').(':'), ['class' => 'form-label required']) }}
                    {{ Form::text('name', null, ['id'=>'editLanguage','class' => 'form-control','required','placeholder' => __('messages.languages.language')]) }}
                </div>
                <div>
                    {{ Form::label('iso_code',__('messages.languages.iso_code').(':'),['class' => 'form-label required']) }}
                    {{ Form::text('iso_code', '', ['class' => 'form-control', 'id' => 'editIso','placeholder' => __('messages.languages.iso_code')]) }}
                </div>

            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary m-0','id' => 'btnEditSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" class="btn btn-secondary my-0 ms-5 me-0" id="btnEditCancel"
                        data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

