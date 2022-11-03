<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    public function consumer_details()
    {
        return $this->belongsTo('App\Concessionaire', 'consumerId', 'id');
    }
    public function user_details()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
