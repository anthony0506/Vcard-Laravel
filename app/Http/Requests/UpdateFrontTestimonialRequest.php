<?php

namespace App\Http\Requests;

use App\Models\FrontTestimonial;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFrontTestimonialRequest extends FormRequest
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
        $rules = FrontTestimonial::$rules;
        $rules['image'] = 'nullable|mimes:jpg,jpeg,png,gif';

        return $rules;
    }

    public function messages()
    {
        return [
            'name.string' => 'The name field is required.',
            'description.string' => 'The description field is required.',
        ];
    }
}
