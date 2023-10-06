<div class="row">
        <div class="mb-3" io-image-input="true">
            <label for="aboutInputImage" class="form-label">{{__('messages.about_us.image')}}:
                <span data-bs-toggle="tooltip"
                      data-placement="top"
                      data-bs-original-title="{{__('messages.tooltip.home_image')}} 620x500"
                >
                                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" ></i>
                        </span>
            </label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="aboutInputImage"
                         style="background-image: url('{{ isset($about->about_url) ? $about->about_url :  asset('front/images/about.png') }}')">
                    </div>
                        <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                              data-placement="top" data-bs-original-title="{{__('messages.tooltip.profile')}}">
                    <label>
                        <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                        <input type="file" name="image[{{ $about->id }}]" class="image-upload d-none" accept=".png, .jpg, .jpeg, .gif"/>
                    </label>
                </span>
                </div>
            </div>
        </div>
        <div class="form-text">{{__('messages.allowed_file_types')}}</div>
    <div class="col-lg-12">
        <div class="mb-5">
            {{ Form::label('title', __('messages.about_us.title').':', ['class' => 'form-label required']) }}
            <span data-bs-toggle="tooltip"
                  data-placement="top"
                  data-bs-original-title="{{__('messages.tooltip.about_title')}}">
                                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" ></i>
                        </span>
            {{ Form::text('title['.$about->id.']', $about->title, ['class' => 'form-control', 'placeholder' => __('messages.about_us.title'), 'required', 'maxlength'=>'100']) }}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-5">
            {{ Form::label('description', __('messages.about_us.description').':', ['class' => 'form-label required']) }}
            <span data-bs-toggle="tooltip"
                  data-placement="top"
                  data-bs-original-title="{{__('messages.tooltip.about_description')}}">
                                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" ></i>
                        </span>
            {!! Form::textarea('description['.$about->id.']', $about->description, ['class' => 'form-control', 'placeholder' => __('messages.about_us.description'), 'required']) !!}
        </div>
    </div>
</div>



