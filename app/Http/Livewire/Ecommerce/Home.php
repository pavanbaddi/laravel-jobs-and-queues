<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;
use App\ProductModel;
use Log;

class Home extends Component
{

    public $products = [];

    public $listeners = [
        // "delete_product" => "deleteProduct",
    ];

    public $filter = [
        "name" => "",
        "range-from" => "",
        "range-to" => "",
        "order_field" => "order_by_name_asc",
    ];
    
    public function mount(){
        $this->loadProducts();
    }

    public function loadProducts(){
        try {
            session()->flash("success", "Loading products ...");
            $query = [];
            $objects = ProductModel::where($query);

            // Price Range 
            if(!empty($this->filter["range-from"]) && !empty($this->filter["range-to"])){
                $price_1 = $this->filter["range-from"];
                $price_2 = $this->filter["range-to"];

                $objects = $objects->whereBetween('price', [$price_1, $price_2]);
            }

            // Search
            if(!empty($this->filter["name"])){
                $filter = $this->filter;
                $objects = $objects->where(function ($query) use ($filter) {
                    $query->where('name', 'LIKE', $this->filter['name'] . '%');
                });
            }
            
            // Ordering
            $field = 'name';
            $type = 'asc';
            switch ($this->filter["order_field"]) {
                case 'order_by_name_asc':
                    $type = 'asc';
                    break;

                case 'order_by_name_desc':
                    $type = 'desc';
                    break;

                case 'order_by_price_low':
                    $field = 'price';
                    $type = 'asc';
                    break;

                case 'order_by_price_high':
                    $field = 'price';
                    $type = 'desc';
                    break;
            }

            $objects = $objects->orderBy($field, $type);
            
            $this->products = $objects->get()->toArray();
        } catch (Throwable $e) {
            session()->flash("error", "Something went wrong");
            $this->products = [];
        }
    }

    public function render()
    {
        return view('livewire.ecommerce.home');
    } 
}
