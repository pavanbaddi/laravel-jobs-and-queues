<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class TodoModel extends Model
{
    protected $table="todos";
    protected $primaryKey = 'todo_id';
    protected $fillable = ['title', 'desc', 'status'];
}
 