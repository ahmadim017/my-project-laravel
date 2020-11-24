<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembuktian extends Model
{
    protected $table = "pembuktian";

    public function usulan()
    {
        return $this->belongsTo('App\usulan','id_usulan');
    }
    public function opd()
    {
        return $this->belongsTo('App\opd','id_opd');
    }
    public function tugas()
    {
        return $this->belongsTo('App\tugas','id_tugas');
    }
    public function pokja()
    {
        return $this->belongsTo('App\pokja','id_pokja');
    }
}
