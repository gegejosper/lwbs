<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monthlybill extends Model
{
    //

    public function concessionaire()
    {
        return $this->belongsTo('App\Concessionaire', 'meternum', 'meternum');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'meternum', 'meternum');
    }
}
