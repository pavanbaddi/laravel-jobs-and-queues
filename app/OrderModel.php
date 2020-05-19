<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class OrderModel extends Model
{
    protected $table="orders";
    protected $primaryKey = 'order_id';
    protected $fillable = ['customer_name', 'email', 'delivery_address', 'mobile_no', 'alternate_mobile_no', 'total_payable_amount', 'status'];
    
    public function items()
    {
        return $this->hasMany(OrderItemModel::class, 'order_id', 'order_id');
    }
}
