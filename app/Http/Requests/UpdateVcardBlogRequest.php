<?php

namespace App\Http\Requests;

use App\Models\VcardBlog;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVcardBlogRequest extends FormRequest
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
        $rules = VcardBlog::$rules;
        $rules['blog_icon'] = 'nullable|mimes:jpg,jpeg,png,gif';

        return $rules;
    }

    public function messages()
    {
        return [
            'title.string' => 'The name field is required.',
            'description.string' => 'The description field is required.',
        ];
    }
}
