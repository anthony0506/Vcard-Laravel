<?php

namespace App\Http\Requests;

use App\Models\Vcard;
use Illuminate\Foundation\Http\FormRequest;

class CreateVcardRequest extends FormRequest
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
        return Vcard::$rules;
        $rules['profile_img'] = 'mimes:jpg,bmp,png,apng,avif,jpeg,gif';
        $rules['cover_img'] = 'mimes:jpg,bmp,png,apng,avif,jpeg,gif';
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'url_alias.string' => 'The URL Alias field is required.',
            'name.string' => 'The name field is required.',
            'url_alias.min' => 'The URL Alias must be at least 6 characters.',
            'url_alias.max' => 'The URL Alias not be grater then 24 characters.',
            'url_alias.unique' => 'The URL Alias must unique.',
        ];
    }
}
