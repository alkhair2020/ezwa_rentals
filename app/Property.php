<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function clients(){
        return $this->hasMany('App\Client','property_id','id');
    } 
}
