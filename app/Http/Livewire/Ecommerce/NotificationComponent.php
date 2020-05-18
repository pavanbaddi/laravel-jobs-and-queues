<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;

class NotificationComponent extends Component
{
    public $listeners = [
        "flash_message" => "flashMessage",
        "check_for_flash_messages" => "checkForFlashMessages",
    ];

    public $flash = [
        "type" => NULL,
        "message" => NULL,
    ];

    public function mount(){
        session()->flash("success", "hellow");
    }

    // public function flashMessage($type, $msg){
    //     session()->flash($type, $msg);
    // }

    public function flashMessage($type, $msg){
        $this->flash["type"] = NULL;
        $this->flash["message"] = NULL;

        $this->flash["type"] = $type;
        $this->flash["message"] = $msg;
    }

    // public function flashMessage(){
    //     $this->flash["type"] = NULL;
    //     $this->flash["message"] = NULL;
    //     dd(session('success'));
    //     if(session()->get('success')){
    //         $this->flash["type"] = "success";
    //         $this->flash["message"] = session()->get('success');
    //     }

    //     if(session()->get('error')){
    //         $this->flash["type"] = "error";
    //         $this->flash["message"] = session()->get('error');
    //     }
    // }

    public function checkForFlashMessages(){
        $this->flash["type"] = NULL;
        $this->flash["message"] = NULL;

        if(session()->get('success')){
            $this->flash["type"] = "success";
            $this->flash["message"] = session()->get('success');
        }

        if(session()->get('error')){
            $this->flash["type"] = "error";
            $this->flash["message"] = session()->get('error');
        }
    }

    public function render()
    {
        return view('livewire.ecommerce.notification');
    }
}
 