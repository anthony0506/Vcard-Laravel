<?php

namespace App\Http\Requests;

use App\Models\EmailSubscription;
use Illuminate\Foundation\Http\FormRequest;

class CreateEmailSubscriptionRequest extends FormRequest
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
        return EmailSubscription::$rules;
    }

    public function messages()
    {
        return [
            'email.unique' => __('messages.placeholder.email_already_subscribed'),
        ];
    }
}
