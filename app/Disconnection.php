<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disconnection extends Model
{
    use HasFactory;
    public function consumer_details(){
        return $this->belongsTo('App\Concessionaire', 'consumer_id', 'id');
    }
}
