<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Receipt extends Model
{
    public function clients()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
