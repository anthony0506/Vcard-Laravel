<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateRegisterRequest extends FormRequest
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
        $rules = User::$rules;
        $rules['password'] = 'required|same:password_confirmation|min:8';
        $rules['term_policy_check'] = 'required';

        return $rules;
    }

    public function messages()
    {
        return [
            'term_policy_check.required' => __('messages.placeholder.agree_term'),
        ];
    }
}
