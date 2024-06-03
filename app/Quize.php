<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quize extends Model
{
    public function levels() {
        return $this->belongsTo(Level::class,"level_id","id");
    }
    public function sets() {
        return $this->belongsTo(Set::class,"set_id","id");
    }
    // public function sets_middle() {
    //     return $this->belongsTo(Set::class,"set_id","id")->where('type','middle');
    // }
    // public function sets_easy() {
    //     return $this->belongsTo(Set::class,"set_id","id")->where('type','easy');
    // }
    
}
