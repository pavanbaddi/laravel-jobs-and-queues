<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class CategoryModel extends Model
{
    protected $table="categories";
    protected $primaryKey = 'category_id';
    protected $fillable = ['name', 'parent_id', 'sort_order'];


    public function categories()
    {
        return $this->hasMany(CategoryModel::class, 'parent_id', 'category_id');
    }
}
