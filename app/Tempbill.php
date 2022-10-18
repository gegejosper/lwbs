<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempbill extends Model
{
    //
    public function monthly_bill()
    {
        return $this->belongsTo('App\MonthlyBill', 'MonthlyBillId', 'id');
    }
}
