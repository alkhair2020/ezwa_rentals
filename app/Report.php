<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    
    public function users(){
        // return $this->hasOne(User::class, 'user_id');
        return $this->belongsTo(User::class,'user_id');
    }
    public function clients(){
        // return $this->hasOne(User::class, 'user_id');
        return $this->belongsTo(Client::class,'client_id','id');
    }
    public function properties(){
        // return $this->hasOne(User::class, 'user_id');
        return $this->belongsTo(Property::class,'property_id','id');
    }
    public function receipts(){
        // return $this->hasOne(User::class, 'user_id');
        return $this->belongsTo(Receipt::class,'receipt_id','id');
    }
    public function expenses(){
        // return $this->hasOne(User::class, 'user_id');
        return $this->belongsTo(Expense::class,'expense_id','id');
    }
}
