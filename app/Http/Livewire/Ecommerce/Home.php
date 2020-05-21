<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;
use App\ProductModel;
use Log;
use Cookie;
use Illuminate\Support\Arr;
use App\Utils\CookieManager;

class Home extends Component
{

    public $products = [];
    public $process_messages = NULL;

    public $listeners = [];

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

    public function addToCart($id){
        try {
            $cookie_manager = new CookieManager();
            
            // Check if cookie exits
            [
                "array" => $cookie_data
            ] = $cookie_manager->getCookie();

            if(empty($cookie_data["items"])){
                $cookie_data["items"] = [];
            }
            
            $product = [];
            foreach($this->products as $k => $v){
                if($v["product_id"] == $id){
                    $product = $v;
                }
            }
            
            if($cookie_manager->checkIfProductExistsInCart($id)){
                $product["quantity"] = 1;
                array_push($cookie_data["items"], $product);

                $cookie_manager->execute($cookie_data);

                session()->flash("success", "Products added to cart.");
            }else{
                session()->flash("info", "Product already exists in cart.");
            }
        } catch (Throwable $e) {
            session()->flash("error", "Something went wrong.");
        }
    }

    public function render()
    {
        return view('livewire.ecommerce.home');
    } 
}

