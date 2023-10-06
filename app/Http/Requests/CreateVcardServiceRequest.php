<?php

namespace App\Http\Requests;

use App\Models\VcardService;
use Illuminate\Foundation\Http\FormRequest;

class CreateVcardServiceRequest extends FormRequest
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
        return VcardService::$rules;
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
