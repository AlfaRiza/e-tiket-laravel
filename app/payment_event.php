<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment_event extends Model
{

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
