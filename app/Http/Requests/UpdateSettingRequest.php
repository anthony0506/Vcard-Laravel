<?php

namespace App\Http\Requests;

use App\Models\Plan;
use App\Models\Setting;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
        $paymentGateways = request()->payment_gateway;
        $rules = Setting::$rules;
        $rules['email'] = 'required|email:filter';
        $rules['favicon'] = 'nullable|mimes:jpg,jpeg,png,gif';
        $rules['address'] = 'required';
        $rules['home_page_banner'] = 'nullable|mimes:jpg,jpeg,png,gif';
        $rules['affiliation_amount'] = 'numeric|min:1';

        if (isset($paymentGateways[Plan::STRIPE])) {
            $rules['stripe_key'] = 'required';
            $rules['stripe_secret'] = 'required';
        }
        if (isset($paymentGateways[Plan::PAYPAL])) {
            $rules['paypal_client_id'] = 'required';
            $rules['paypal_secret'] = 'required';
        }
        if (isset($paymentGateways[Plan::RAZORPAY])) {
            $rules['razorpay_key'] = 'required';
            $rules['razorpay_secret'] = 'required';
        }

        return $rules;
    }
}
