<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_role extends Model
{
    protected $fillable = ['role'];
    public function user_access_menu()
    {
        return $this->belongsTo('App\User_access_menu', 'foreign_key');
    }

    
}
