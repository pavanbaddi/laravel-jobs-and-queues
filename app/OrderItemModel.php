<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class OrderItemModel extends Model
{
    protected $table="order_items";
    protected $primaryKey = 'order_item_id';
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];
    
    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'order_id', 'order_id');
    }
}
