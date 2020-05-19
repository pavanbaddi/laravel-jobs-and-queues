<?php

namespace App\Http\Livewire\Ecommerce\Product;

use Livewire\Component;
use App\ProductModel;
use Log;

class ListComponent extends Component
{

    public $products = [];

    public $listeners = [
        "delete_product" => "deleteProduct",
    ];
    
    public function mount(){
        $this->loadProducts();
    }

    public function loadProducts(){
        try {
            $products = ProductModel::all()->toArray();
            $this->products = $products;
        } catch (Throwable $e) {
            session()->flash("error", "Something went wrong");
            $this->products = [];
        }
    }

    public function deleteProduct($id){
        try {
            ProductModel::find($id)->delete();
            session()->flash("success", "Product removed successfully.");
            $this->loadProducts();
        } catch (Throwable $e) {
            session()->flash("error", "Something went wrong");
        }
    }

    public function render()
    {
        return view('livewire.ecommerce.product.list');
    }
}
