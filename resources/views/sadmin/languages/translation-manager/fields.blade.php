<div class="row">
    <div class="col-lg-4 mb-7">
        {{Form::select('file_name', $allFiles, $selectedFile, ['class' => 'form-select','placeholder' => 'Select File', 'id'=>'subFolderFiles', 'data-control'=>'select2']) }}
    </div>
    <div class="form-group col-sm-3 mb-7 d-flex justify-content-end offset-3 ms-auto">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary','name' => 'save', 'id' => 'saveJob']) }}
    </div>
    <hr>
    <br>
    @foreach($languages as $key => $value)
        @if(!is_array($value))
            <div class="form-group col-sm-4 mb-5">
                {{ Form::label('title', str_replace('_',' ',ucfirst($key)).':', ['class' => 'form-label']) }}
                {{ Form::text($key, $value, ['class' => 'form-control','required','placeholder' => str_replace('_',' ',ucfirst($key))]) }}
            </div>
        @else
            @foreach($value as $nestedKey => $nestedValue)
                @if(!is_array($nestedValue))
                    <div class="form-group col-lg-4 col-md-3 mb-4">
                        {{ Form::label('title',  str_replace('_',' ',ucfirst($nestedKey)) .':', ['class' => 'form-label']) }}
                        <input type="text" class="form-control" name="{{$key}}[{{$nestedKey}}]"
                               value="{!! $nestedValue !!}" placeholder="{{str_replace('_',' ',ucfirst($nestedKey))}}"/>
                    </div>
                @endif
            @endforeach
        @endif
    @endforeach
</div>
