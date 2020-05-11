<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUser extends FormRequest
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
            'role' => 'required',
            'first_name' => 'required',
            'last_name' => 'nullable',
            'date_of_birth' => 'required|date',
            'mobile_no' => 'required|integer',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            "role.required" => "Role must be selected",
            "first_name.required" => "First name must be filled",
            "date_of_birth.required" => "Date of Birth is required",
            "date_of_birth.date" => "Date of Birth must be in date format year/month/day",
            "mobile_no.required" => "Mobile number is required",
            "mobile_no.integer" => "Mobile number must be a number",
            "email.required" => "Email is required",
            "email.email" => "Invalid email id given.",
            "password.required" => "Password must be filled",
            "confirm_password.required" => "Confirm Password must be filled",
            "confirm_password.same" => "Confirm Password does not match Password",
        ];
    }
}
