<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_menu extends Model
{
    public function user_access_menu()
    {
        return $this->hasMany('App\user_access_menu', 'id');
    }
    public function user_sub_menu()
    {
        return $this->belongsTo('App\user_access_menu', 'foreign_key');
    }
}
