<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tugas extends Model
{
    protected $table = "surattugas";

    public function usulan()
    {
        return $this->belongsTo('App\usulan','id_usulan');
    }

    public function opd()
    {
        return $this->belongsTo('App\opd','id_opd');
    }

    public function pokja()
    {
        return $this->belongsTo('App\pokja','id_pokja');
    }

    public function pembuktian()
    {
        return $this->hasMany('App\pembuktian');
    }

    public function hasillelang()
    {
        return $this->hasMany('App\hasillelang');
    }

    public function spj()
    {
        return $this->hasMany('App\spj');
    }
}
