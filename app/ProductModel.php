<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ProductModel extends Model
{
    protected $table="products";
    protected $primaryKey = 'product_id';
    protected $fillable = ['name', 'image', 'price'];
    
    public function getImageAttribute(){ 
        $image = "";
        if(!empty($this->attributes["image"])){
            $image = url('storage/uploads/'.$this->attributes["image"]);
        }
        return $image;
    }
}
