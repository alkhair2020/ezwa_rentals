<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Expense extends Model
{
    public function clients()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
    public function users(){
        // return $this->hasOne(User::class, 'user_id');
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function reports(){
        return $this->hasOne(Report::class,'expense_id','id');
    }
}
