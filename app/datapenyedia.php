<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class datapenyedia extends Model
{
    protected $table = "penyediabaru";

    
        public function getCreatedAtAttribute()
        {
            return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->format('d M Y');
        }

}
