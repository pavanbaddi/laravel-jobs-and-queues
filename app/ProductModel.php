<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ProductModel extends Model
{
    protected $table="products";
    protected $primaryKey = 'product_id';
    protected $fillable = ['name', 'image', 'price'];
    protected $appends = ["image"];

    public function getImageAttribute(){
        $image = "";
        if(!empty($obj->attributes["image"])){
            $image = url('public/storage/uploads/'.$obj->attributes["image"]);
        }
        return $image;
    }
}
