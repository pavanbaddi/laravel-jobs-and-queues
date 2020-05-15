<?php

namespace App\Http\Livewire\Todo;

use Livewire\Component;
use Log;

class TodoNotificationComponent extends Component
{
    public $listeners = [
        "flash_message" => "flashMessage"
    ];

    public function flashMessage($type, $msg){
        // dd($type, $msg);
        session()->flash($type, $msg);
    }

    public function render()
    {
        return view('livewire.todo.todo-notification');
    }
}
