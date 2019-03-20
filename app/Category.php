<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function concessionaire()
    {
        return $this->hasMany('App\Concessionaire', 'category', 'id');
    }
    public function readerconcessionaire()
    {
        return $this->hasMany('App\Concessionaire', 'id', 'category');
    }
}
