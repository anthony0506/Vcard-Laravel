<?php

namespace App\Http\Requests;

use App\Models\ScheduleAppointment;
use Illuminate\Foundation\Http\FormRequest;

class CreateScheduleAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        setLocalLang(getLocalLanguage());

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return ScheduleAppointment::$rules;
    }

    public function messages()
    {
        return [
            'phone.min' => 'Phone must be a number',
        ];
    }
}
