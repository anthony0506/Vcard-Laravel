<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLanguageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules['name'] = 'required|max:20|unique:languages,name,'.$this->route('language')->id;
        $rules['iso_code'] = 'required|max:2|min:2|unique:languages,iso_code,'.$this->route('language')->id;

        return $rules;
    }

    public function messages()
    {
        $messages['iso_code.required'] = 'The ISO Code field is required.';

        return $messages;
    }
}
