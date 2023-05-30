<?php

namespace App\Http\Requests;

use App\Models\VcardService;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVcardServiceRequest extends FormRequest
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
        $rules = VcardService::$rules;
        $rules['service_icon'] = 'nullable|mimes:jpg,jpeg,png,gif';

        return $rules;
    }

    public function messages()
    {
        return [
            'name.string' => 'The name field is required.',
            'description.string' => 'The description field is required.',
            //            'service_url.url'     => 'The Service URL must be a valid URL'
        ];
    }
}
