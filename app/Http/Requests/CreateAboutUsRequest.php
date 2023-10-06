<?php

namespace App\Http\Requests;

use App\Models\AboutUs;
use Illuminate\Foundation\Http\FormRequest;

class CreateAboutUsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return AboutUs::$rules;
    }

    public function messages()
    {
        return [
            'title.*.string' => 'The title field is required.',
            'title.*.max' => 'The title not be greater then 100 characters.',
            'description.*.string' => 'The description field is required.',
            'description.*.max' => 'The description not be greater then 500 characters.',
        ];
    }
}
