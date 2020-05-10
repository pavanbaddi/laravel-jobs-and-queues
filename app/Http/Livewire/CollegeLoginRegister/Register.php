<?php

namespace App\Http\Livewire\CollegeLoginRegister;

use Livewire\Component;

class Register extends Component
{

    public $role="student";

    public function mount(){
        if($this->role=="student"){
            
        }
    }

    public function render()
    {
        return view('livewire.college-login-register-test.register', []);
    }
}
