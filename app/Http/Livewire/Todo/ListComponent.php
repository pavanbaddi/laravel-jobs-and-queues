<?php

namespace App\Http\Livewire\Todo;

use Livewire\Component;
use Log;
use App\TodoModel;

class ListComponent extends Component
{

    public $objects = [];

    public $loading_message = "";

    public $listeners = [
        "load_list" => "loadList"
    ];

    public function mount(){
        $this->objects = $this->loadList();
    }

    public function loadList(){
        $this->loading_message = "Loading Todos...";
        $this->objects = TodoModel::where([])->get();
    }


    public function render()
    {
        return view('livewire.todo.list'); 
    }
}
