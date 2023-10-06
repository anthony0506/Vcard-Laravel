<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
        $rules = Role::$rules;

        return $rules;
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'display_name.required' => 'Name field is required',
            'permission_id.required' => 'Please select any one permission',
        ];
    }
}
