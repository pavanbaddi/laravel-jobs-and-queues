<?php

namespace App\Http\Livewire\Todo;

use Livewire\Component;

class TodoComponent extends Component
{

    public $submit_btn_title = "Save Task";
    public $form = [
        "title" => "Todo Title",
        "desc" => "Todo Description",
        "status" => "",
    ];

    public function render()
    {
        return view('livewire.todo.todo'); 
    }
}
