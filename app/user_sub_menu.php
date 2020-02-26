<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_sub_menu extends Model
{
    public function user_menu()
    {
        return $this->hasMany('App\user_menu', 'foreign_key');
    }
}
