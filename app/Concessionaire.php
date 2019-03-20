<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concessionaire extends Model
{
    //
    protected $fillable = [
        'meternum', 'clark','pic', 'category', 'status'
    ];

    public function user()
    {
        return $this->belongsTO('App\User', 'meternum', 'meternum');
    }
    public function rate()
    {
        return $this->belongsTO('App\Rate', 'category', 'id');
    }
    public function bill()
    {
        return $this->hasOne('App\Monthlybill', 'meternum', 'meternum')->latest();
    }

    public function cashierbill()
    {
        return $this->hasOne('App\Monthlybill', 'meternum', 'meternum')->latest();
    }
}
