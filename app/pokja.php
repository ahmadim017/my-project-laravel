<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pokja extends Model
{
    protected $table = "pokja";
    
    public function tugas()
    {
        return $this->hasMany('App\tugas');
    }
    public function pembuktian()
    {
        return $this->hasMany('App\pembuktian');
    }
    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }
}
