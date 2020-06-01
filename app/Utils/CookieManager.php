<?php

namespace App\Utils;

use Log;
use Cookie;
use Illuminate\Support\Arr;

class CookieManager
{
    public function getCookie($name="cart_data"){
        $json = Cookie::get($name) ?? [];
        $info = [
            "json" => is_array($json)? "" : $json,
            "array" => json_decode(is_array($json)? "" : $json, TRUE),
        ];

        return $info;
    }

    public function checkIfProductExistsInCart($id){
        ["array" => $array] = $this->getCookie();
        
        if(empty($array["items"])){
            return TRUE;
        }

        $first = Arr::first($array["items"], function ($value, $key) use ($id){
            return $value["product_id"] == $id;
        });
        
        if(!empty($first)){
            return FALSE;
        }else{
            return TRUE;
        }
    }    

    public function execute($arr, $cookie_name="cart_data"){
        $minutes = 60*3600;
        Cookie::queue($cookie_name, json_encode($arr), $minutes);
    }

    public function flush($cookie_name="cart_data"){
        $minutes = 60*3600;
        Cookie::queue($cookie_name, json_encode([]), $minutes);
    }
}
