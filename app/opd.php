<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class opd extends Model
{
    protected $table = "opd";

    public function tugas()
    {
        return $this->hasMany('App\tugas');
    }

    public function usulan()
    {
        return $this->hasMany('App\usulan');
    }

    public function pembuktian()
    {
        return $this->hasMany('App\pembuktian');
    }

}
