<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class UserProfileModel extends Model
{
    protected $table="users_profile";
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'role', 'date_of_birth', 'mobile_no', 'course', 'sem', 'parent_mobile_no'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
