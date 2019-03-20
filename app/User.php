<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'email', 'password','lname', 'mname', 'meternum', 'usertype',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function concessionaire()
    {
        return $this->belongsTo('App\Concessionaire', 'id', 'userId');
    }
   
    // public function bill()
    // {
    //     return $this->hasMany('App\Bill', 'consumerId', 'id');
    // }

    // public function cashierbill()
    // {
    //     return $this->hasMany('App\Monthlybill', 'meternum', 'meternum');
    // }
}
