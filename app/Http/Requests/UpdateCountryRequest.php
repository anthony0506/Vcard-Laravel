<?php

namespace App\Http\Requests;

use App\Models\Country;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
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
        $rules = Country::$rules;
        $rules['name'] = $rules['name'].$this->route('country')->id;
        $rules['short_code'] = $rules['short_code'].$this->route('country')->id;
        $rules['phone_code'] = $rules['phone_code'].$this->route('country')->id;

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'short_code.alpha' => __('messages.placeholder.short_code_only_alpha'),
        ];
    }
}
