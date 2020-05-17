<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;

class NotificationComponent extends Component
{
    public $listeners = [
        "flash_message" => "flashMessage"
    ];

    public function flashMessage($type, $msg){
        session()->flash($type, $msg);
    }

    public function render()
    {
        return view('livewire.ecommerce.notification');
    }
}
