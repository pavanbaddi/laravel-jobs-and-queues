<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveOrderRequest extends FormRequest
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
        return [
            'customer_name' => 'required',
            'email' => 'required|email',
            'delivery_address' => 'required',
            'mobile_no' => 'required|integer',
            'alternate_mobile_no' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Customer name required.',
            'email.required' => 'Email Id is required.',
            'email.email' => 'Invalid email ID.',
            'delivery_address.required' => 'Delivery address required.',
            'mobile_no.required' => 'Mobile number is required.',
            'mobile_no.integer' => '',
            'alternate_mobile_no.required' => 'Alternate mobile number is required.',
            'alternate_mobile_no.integer' => 'Invalid mobile number',
        ];
    }
}
