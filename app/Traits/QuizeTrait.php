<?php

namespace App\Traits;
use Response;
use Carbon\Carbon;
use App\Quize;

trait QuizeTrait
{
    public function get_quizes()
    {
        $data =Quize::where('level_name','A2')->with('levels')->whereHas('sets', function ($query){
            $query->where('type', 'difficult');
        })->with("sets")->take(5)->get();
        return $data;
    }

}