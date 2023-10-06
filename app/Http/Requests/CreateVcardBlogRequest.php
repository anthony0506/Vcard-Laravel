<?php

namespace App\Http\Requests;

use App\Models\VcardBlog;
use Illuminate\Foundation\Http\FormRequest;

class CreateVcardBlogRequest extends FormRequest
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
        return VcardBlog::$rules;
    }

    public function messages()
    {
        return [
            'title.string' => 'The name field is required.',
            'description.string' => 'The description field is required.',
        ];
    }
}
