<div class="row">
    <div class="col-lg-6 mb-5">
        <div class="mb-3" io-image-input="true">
            <label for="featuresInputImage" class="form-label required">{{__('messages.feature.feature_image')}}:
                
            </label>
            <span data-bs-toggle="tooltip"
                  data-placement="top"
                  data-bs-original-title="{{__('messages.tooltip.home_image')}} 70x70">
                                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" ></i>
                        </span>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="featuresInputImage"
                         style="background-image: url('{{ !empty($feature->profile_image) ? $feature->profile_image : asset('web/media/avatars/150-26.jpg') }}')">
                    </div>
                         <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                               data-placement="top" data-bs-original-title="{{__('messages.tooltip.profile')}}">
                    <label>
                        <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                        <input type="file" id="profile_image" name="featureImage" class="image-upload d-none"
                               accept="image/*"/>
                    </label>
                </span>
                </div>
            </div>
        </div>
        <div class="form-text">{{__('messages.allowed_file_types')}}</div>
    </div>
    <div class="col-lg-12">
        <div class="mb-5">
            {{ Form::label('name', __('messages.feature.name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            <span data-bs-toggle="tooltip"
                  data-placement="top"
                  data-bs-original-title="{{__('messages.tooltip.banner_title')}}">
                                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" ></i>
                        </span>
            {{ Form::text('name', (isset($feature)) ? $feature->name : null, ['class' => 'form-control', 'placeholder' => __('messages.feature.name'), 'required', 'maxlength'=>'34']) }}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-5">
            {{ Form::label('description', __('messages.feature.description').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            <span data-bs-toggle="tooltip"
                  data-placement="top"
                  data-bs-original-title="{{__('messages.tooltip.about_description')}}">
                                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" ></i>
                        </span>
            {!! Form::textarea('description', (isset($feature)) ? $feature->description : null, ['class' => 'form-control', 'placeholder' => __('messages.feature.description'), 'required', 'maxlength'=>'239']) !!}
        </div>
    </div>
    <div class="d-flex">
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3']) }}
        <a href="{{ route('features.index') }}" type="reset"
           class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>
</div>


