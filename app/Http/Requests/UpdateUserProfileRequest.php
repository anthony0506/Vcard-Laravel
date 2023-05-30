<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserProfileRequest extends FormRequest
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
        $id = Auth::id();

        $rules = User::$rules;
        $rules['email'] = $rules['email'].$id;
        $rules['profile'] = 'mimes:jpg,bmp,png,apng,avif,jpeg,gif';
        $rules['contact'] = 'required';

        return $rules;
    }
}
