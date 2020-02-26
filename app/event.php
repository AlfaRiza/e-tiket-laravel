<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $fillable = ['id_user','image','nama_event','tgl_mulai','tgl_selesai','waktu_mulai','waktu_selesai','tempat','kuota','biaya'];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function peserta_event(){
        return $this->hasMany('App\Peserta_event');
    }

    public function payment_event(){
        return $this->hasOne('App\Payment_user');
    }

}
