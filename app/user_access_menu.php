<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_access_menu extends Model
{
    public function user_role()
    {
        return $this->hasMany('App\user_role', 'foreign_key');
    }

    public function user_menu()
    {
        return $this->belongsTo('App\user_menu', 'id', 'menu_id');
    }
}
