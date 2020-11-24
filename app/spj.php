<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spj extends Model
{
    protected $table = "spj";

    public function tugas()
    {
        return $this->belongsTo('App\tugas','id_tugas');
    }

    public function hasil()
    {
        return $this->belongsTo('App\hasillelang','id_hasil');
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
        ->format('d M Y');
    }
}
