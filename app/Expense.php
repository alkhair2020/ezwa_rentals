<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Expense extends Model
{
    public function clients()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
