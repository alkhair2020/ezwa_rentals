<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function properties()
    {
        return $this->belongsTo(Property::class,'property_id');
    }
    public function users(){
        // return $this->hasOne(User::class, 'user_id');
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function receipts(){
        return $this->hasOne(Receipt::class,'client_id','id');
    }
    public function expenses(){
        return $this->hasOne(Expense::class,'client_id','id');
    }

    
}
