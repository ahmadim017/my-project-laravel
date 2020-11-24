<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perubahanpenyedia extends Model
{
    protected $table = "perubahanpenyedia";

    public function getCreatedAtAttribute()
        {
            return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->format('d M Y');
        }
}
