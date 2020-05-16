<?php

namespace App\Http\Livewire\Todo;

use Livewire\Component;
use Log;
use App\TodoModel;
use Livewire\WithPagination;

class ListComponent extends Component
{

    use WithPagination;

    public $objects = [];

    public $paginator = [];

    public $loading_message = "";

    public $listeners = [
        "load_list" => "loadList"
    ];

    public function mount(){
        $this->loadList();
    }

    public function loadList(){
        $this->loading_message = "Loading Todos...";
        $objects = TodoModel::where([])->orderBy('status', 'ASC')->paginate(5);
        $this->paginator = $objects->toArray();
        $this->objects = $objects->items();

        dd($this->paginator);
    }


    public function render()
    {
        return view('livewire.todo.list'); 
    }
}
