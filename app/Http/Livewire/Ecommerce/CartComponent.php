<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;
use App\Utils\CookieManager;
use Illuminate\Support\Arr;
use App\Http\Requests\SaveOrderRequest;
use DB;
use App\OrderModel;
use App\OrderItemModel;

class CartComponent extends Component
{
    public $items = [];
    public $order_form = [
        'customer_name' => '',
        'email' => '',
        'delivery_address' => '',
        'mobile_no' => '',
        'alternate_mobile_no' => '',
    ];
    public $totals = [
        "qty" => 0,
        "amount" => 0,
    ];

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


        foreach(($array["items"] ?? []) as $k => $v){
            $this->totals["qty"] += $v["quantity"];
            $this->totals["amount"] += (int)$v["quantity"]*$v["price"];
        }

        return $array;
    }

    public function updatedItems(){
        $cookie_manager = new CookieManager();
        $this->totals["qty"] = 0;
        $this->totals["amount"] = 0;
        foreach(($this->items ?? []) as $k => $v){
            $this->totals["qty"] += $v["quantity"];
            $this->totals["amount"] += (int)$v["quantity"]*$v["price"];
        }

        [
            "array" => $array
        ] = $cookie_manager->getCookie();

        $array["items"] = $this->items;

        $cookie_manager->execute($array);
    }

    public function removeItem($id)
    {
        $cookie_manager = new CookieManager();

        [
            "array" => $array
        ] = $cookie_manager->getCookie();

        foreach(($array['items'] ?? []) as $k => $v){
            if($v["product_id"] == $id){
                unset($array['items'][$k]);
            }
        }

        $this->items = $array['items'];

        $cookie_manager->execute($array);

        session()->flash('success', "Item removed from cart.");

        $this->updatedItems();
    }

    public function saveOrder(){
        $saveOrderRequest = new SaveOrderRequest();
        $saveOrderRequest->merge($this->order_form);

        $validated_data = $saveOrderRequest->validate($saveOrderRequest->rules());

        DB::beginTransaction(); 
        try {
            $query = [
                "customer_name" => $validated_data["customer_name"],
                "email" => $validated_data["email"],
                "delivery_address" => $validated_data["delivery_address"],
                "mobile_no" => $validated_data["mobile_no"],
                "alternate_mobile_no" => $validated_data["alternate_mobile_no"],
                "total_payable_amount" => $this->totals["amount"], 
                "status" => "pending",
            ];

            $info["order"] = OrderModel::create($query);

            foreach($this->items as $k => $v){
                $query = [
                    "product_id" => $v["product_id"],
                    "quantity" => $v["quantity"],
                    "price" => $v["price"],
                ];
                $info["order"]->items()->create($query);
            }
            
            DB::commit();
            $info['success'] = TRUE;

            $this->order_form = [
                'customer_name' => '',
                'email' => '',
                'delivery_address' => '',
                'mobile_no' => '',
                'alternate_mobile_no' => '',
            ];
        } catch (\Exception $e) {
            DB::rollback();
            $info['success'] = FALSE;
        }

        if($info["success"]){ 

            // empty cookie data
            $cookie_manager = new CookieManager();
            $cookie_manager->flush();
            $this->items = [];

            $type = "success";
            $message = "New order confirmed.";
        }else{
            $type = "error";
            $message = "Something went wrong while saving order.";
        }

        session()->flash($type, $message);
    }

    public function render()
    {
        return view('livewire.ecommerce.cart');
    }
}
