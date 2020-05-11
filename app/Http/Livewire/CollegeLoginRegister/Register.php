<?php

namespace App\Http\Livewire\CollegeLoginRegister;

use Livewire\Component;
use Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterUser;

class Register extends Component
{

    public $user = [
        "role" => "student",
        "first_name" => "pavan",
        "last_name" => "",
        "date_of_birth" => "2020-05-11",
        "course" => "",
        "sem" => "",
        "mobile_no" => "",
        "parent_mobile_no" => "",
        "email" => "",
        "password" => "",
        "confirm_password" => "",
    ];

    public $validation_errors = [];

    public function mount(){
        
    }

    public function save(){

        $rules=[
            'role' => 'required',
            'first_name' => 'required',
            'last_name' => 'nullable',
            'date_of_birth' => 'required|date',
            'mobile_no' => 'required|integer',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ];

        $messages = [
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

        if($this->user["role"]=="student"){
            // array_merge($rules, [
            //     "course" => "required",
            //     "sem" => "required",
            //     "parent_mobile_no" => "required|integer",
            // ]);

            // array_merge($messages, [
            //     "course.required" => "Course must be selected",
            //     "sem.required" => "Semester is required",
            //     "parent_mobile_no.required" => "Parent Mobile number is required",
            //     "parent_mobile_no.integer" => "Parent Mobile number must be a number",
            // ]);
        }elseif($this->user["role"]=="teacher"){

        }else{

        }
        $validator_object = Validator::make($this->user,$rules, $messages);

        if($validator_object->fails()){
            $this->validation_errors = $validator_object->errors()->toArray();
        }
        
    }

    public function render()
    {
        return view('livewire.college-login-register-test.register', []);
    }
}
