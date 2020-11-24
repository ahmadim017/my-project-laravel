<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usulan extends Model
{
    protected $table = "usulan";

    public function opd()
    {
        return $this->belongsTo('App\opd','id_opd');
    }

    public function tugas()
    {
        return $this->hasMany('App\tugas');
    }

    public function pembuktian()
    {
        return $this->hasMany('App\pembuktian');
    }


}
