<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monthlybill extends Model
{
    //

    public function consumer_details()
    {
        return $this->belongsTo('App\Concessionaire', 'meternum', 'meternum');
    }

    public function concessionaire()
    {
        return $this->belongsTo('App\Concessionaire', 'meternum', 'meternum');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'meternum', 'meternum');
    }
    public function temp_bill()
    {
        return $this->belongsTo('App\Tempbill', 'id', 'MonthlyBillId');
    }
}
