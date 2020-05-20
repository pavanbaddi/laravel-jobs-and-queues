<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;
use App\Utils\CookieManager;
use Illuminate\Support\Arr;

class CartComponent extends Component
{
    public $items = [];

    public function mount()
    {
        $cart = $this->getItems();
        $this->items = $cart['items'] ?? [];
    }

    public function getItems(){
        $cookie_manager = new CookieManager();

        [
            "array" => $array
        ] = $cookie_manager->getCookie();

        return $array;
    }

    public function removeItem($id)
    {
        $cookie_manager = new CookieManager();

        [
            "array" => $array
        ] = $cookie_manager->getCookie();

        foreach(($this->items ?? []) as $k => $v){
            if($v["product_id"] == $id){
                unset($this->items[$k]);
            }
        }

        $array['items'] = $this->items;

        $cookie_manager->execute($array);

        $this->mount();
    }

    public function render()
    {
        return view('livewire.ecommerce.cart');
    }
}
