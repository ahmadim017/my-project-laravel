<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hasillelang extends Model
{
    protected $table = "hasillelang";

    public function tugas()
    {
        return $this->belongsTo('App\tugas','id_tugas');
    }

    public function spj()
    {
        return $this->hasMany('App\spj');
    }
}
