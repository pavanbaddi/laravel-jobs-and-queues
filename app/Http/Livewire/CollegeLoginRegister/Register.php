<?php

namespace App\Http\Livewire\CollegeLoginRegister;

use Livewire\Component;
use Log;
use Illuminate\Support\Facades\Validator;
use App\User;
use DB; 

class Register extends Component
{

    // public $user = [
    //     "role" => "student",
    //     "first_name" => "pavan",
    //     "last_name" => "",
    //     "date_of_birth" => "2020-05-11",
    //     "course" => "",
    //     "sem" => "",
    //     "mobile_no" => "",
    //     "parent_mobile_no" => "",
    //     "email" => "",
    //     "password" => "",
    //     "confirm_password" => "",
    // ];


    public $user = [
        "role" => "student",
        "first_name" => "pavan",
        "last_name" => "",
        "date_of_birth" => "2020-05-11",
        "course" => "bca",
        "sem" => "3",
        "mobile_no" => "8892279412",
        "parent_mobile_no" => "9008890286",
        "email" => "pavanbaddi911@gmail.com",
        "password" => "123",
        "confirm_password" => "123",
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
            $rules = array_merge($rules, [ 
                "course" => "required",
                "sem" => "required",
                "parent_mobile_no" => "required|integer",
            ]);

            $messages = array_merge($messages, [
                "course.required" => "Course must be selected",
                "sem.required" => "Semester is required",
                "parent_mobile_no.required" => "Parent Mobile number is required",
                "parent_mobile_no.integer" => "Parent Mobile number must be a number",
            ]);
        }elseif($this->user["role"]=="teacher"){

        }else{

        }

        $validator_object = Validator::make($this->user,$rules, $messages);

        if($validator_object->fails()){
            return $this->validation_errors = $validator_object->errors()->toArray();
        }else{
            //Create 
            $info = [
                "success" => FALSE,
                "user" => NULL,
            ];
            DB::beginTransaction(); 
            try {
                $query = [
                    "first_name" => $this->user["first_name"],
                    "last_name" => $this->user["last_name"],
                    "name" => $this->user["first_name"]." ".$this->user["last_name"],
                    "email" => $this->user["email"],
                    "password" => bcrypt($this->user["password"]),
                ];

                // dd($query);
                $info["user"] = User::create($query);

                $query = [
                    "role" => $this->user["role"],
                    "date_of_birth" => $this->user["date_of_birth"],
                    "mobile_no" => $this->user["mobile_no"],
                    "course" => $this->user["course"],
                    "sem" => $this->user["sem"],
                    "parent_mobile_no" => $this->user["parent_mobile_no"],
                ];
                $info["user"]->profile()->create($query);

                // DB::commit();
                $info['success'] = TRUE;
            } catch (\Exception $e) {
                dd($e);
                Log::info($e);
                DB::rollback();
                $info['success'] = FALSE;
            }
        }
        
        if($info["success"]){
            session()->flash('success', 'User registered successfully.');
        }else{
            session()->flash('error', 'Something went wrong while registration. Please try again later.');
        }

    }

    public function render()
    {
        return view('livewire.college-login-register-test.register', []);
    }
}
