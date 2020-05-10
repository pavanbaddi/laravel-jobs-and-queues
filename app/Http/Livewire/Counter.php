<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Log;

class Counter extends Component
{

    public $initial = 0;

    public $starting_counter_number=NULL;

    public function increament(){
        $this->initial+=1;
    }

    public function decreament(){
        if($this->initial>0){
            $this->initial-=1;
        }else{
            session()->flash('info', "You cannot have negative value in counter");
        }
    }

    public function counterForm(){

        $validated_data = $this->validate([
            "starting_counter_number" => "required|integer|gte:0",
        ]);

        $num = $validated_data["starting_counter_number"];

        $this->initial = $num;
    }

    public function render()
    {
        return view('livewire.counter-views.counter'); 
    }
}
