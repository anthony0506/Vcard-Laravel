<?php

namespace App\Http\Requests;

use App\Models\State;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStateRequest extends FormRequest
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
        $rules = State::$rules;
        $rules['name'] = $rules['name'].$this->route('state')->id;

        return $rules;
    }
}
