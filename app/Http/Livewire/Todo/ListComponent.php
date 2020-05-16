<?php

namespace App\Http\Livewire\Todo;

use Livewire\Component;
use Log;
use App\TodoModel;
use Livewire\WithPagination;

class ListComponent extends Component
{

    // use WithPagination;

    public $objects = [];

    public $paginator = [];

    public $page = 1;

    public $loading_message = "";

    public $listeners = [
        "load_list" => "loadList"
    ];

    protected $updatesQueryString = ['page'];
 
    public function mount(){
        $this->loadList();
    }

    public function updateQuery(){
        $this->page+=1;
        $this->loadList();
    }

    public function loadList(){
        $this->loading_message = "Loading Todos...";
        $objects = TodoModel::where([])->orderBy('status', 'ASC')->paginate(5);
        $this->paginator = $objects->toArray();
        $this->objects = $objects->items();

        // dd($this->paginator);
    }

    // Pagination Methods
    public function applyPagination($action, $value, $options=[]){
        // dd($action, $value);

        if( $action == "previous_page" ){
            $this->page-=1;
        }

        if( $action == "next_page" ){
            $this->page+=1;
        }

        if( $action == "page" ){
            $this->page=$value;
        }

        $this->loadList();
    }



    public function render()
    {
        return view('livewire.todo.list'); 
    }
}
