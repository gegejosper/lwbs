<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    //
    public function concessionaire()
    {
        return $this->hasMany('App\Concessionaire', 'category', 'meternum');
    }
}
