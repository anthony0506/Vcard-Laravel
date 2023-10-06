<div class="row">
    <div class="col-lg-6">
        <div class="mb-3" io-image-input="true">
            <label class="form-label"><span class="required">{{__('messages.front_cms.banner')}}:</span>
                <span data-bs-toggle="tooltip"
                      data-placement="top"
                      data-bs-original-title="{{__('messages.tooltip.home_image')}} 620x522">
                                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" ></i>
                        </span>
            </label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage"
                         style="background-image: url('{{ !empty($setting['home_page_banner']) ? $setting['home_page_banner'] : 
                            asset('assets/images/infyom-logo.png') }}')">
                    </div>
                         <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                               data-placement="top" data-bs-original-title="{{__('messages.tooltip.profile')}}">
                    <label>
                        <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                        <input type="file"  name="home_page_banner" class="image-upload d-none" accept=".png, .jpg, .jpeg, .gif"/>
                    </label>
                </span>
                </div>
            </div>
        </div>
        @if(!isset($setting))
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                  data-bs-toggle="tooltip" title=""
                  data-bs-original-title="Remove profile">
                        <i class="bi bi-x fs-2"></i>
            </span>
        @endif
        <div class="form-text">{{__('messages.allowed_file_types')}}</div>
    <div class="col-lg-12">
        <div class="mb-5">
            {{ Form::label('title', __('messages.front_cms.title').':', ['class' => 'form-label required']) }}
            <span data-bs-toggle="tooltip"
                  data-placement="top"
                  data-bs-original-title="{{__('messages.tooltip.banner_title')}}">
                                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" ></i>
                        </span>
            {{ Form::text('home_page_title', $setting['home_page_title'], ['class' => 'form-control', 'placeholder' => __('messages.front_cms.title'), 'required', 'maxlength'=>'34']) }}
            <input type="hidden" name="front_cms_form" value="1">
        </div>
        <div class="mb-5">
            {{ Form::label('home_page_tagline', __('messages.common.sub_text').':', ['class' => 'form-label required']) }}
            <span data-bs-toggle="tooltip"
                  data-placement="top"
                  data-bs-original-title="{{__('messages.tooltip.sub_text')}}">
                                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"></i>
                        </span>
            {{ Form::text('sub_text', $setting['sub_text'], ['class' => 'form-control', 'id' => 'settingSubText','placeholder'=> __('messages.common.sub_text'),'required','maxlength'=>'60']) }}
        </div>
    </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('extra_js_front', __('messages.extra_scripts').':', ['class' => 'form-label']) }}
            <small class="form-text">{{__('messages.type_in_script')}}</small>
            {{ Form::textarea('extra_js_front',$setting['extra_js_front'], ['class' => 'form-control', 'id' => 'extraJsFront','placeholder'=>  __('messages.extra_scripts'),'rows'=>'9']) }}
        </div>
    </div>
    <div class="d-flex">
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3','id'=>'frontCmsSaveBtn']) }}
        <a href="" type="reset" class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>
</div>

