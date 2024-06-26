<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Auth;



use App\User;
use App\Client;
use Illuminate\Support\Carbon as Carbon;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $tomorrow = Carbon::tomorrow()->format('Y-m-d');
        $datenow=Carbon::now()->format('Y-m-d');

        $notify_clients = [];
        $towday_clients = Client::where('end_date',$tomorrow)->with('properties')->get();
        foreach ($towday_clients as $towday) {
            $towday->time_out="two day";
            $notify_clients[] = $towday;
        }
        
        $one_clients = Client::where('end_date',$datenow)->with('properties')->get();
        foreach ($one_clients as $item) {
            $item->time_out="one day";
            $notify_clients[] = $item;
        }
        $notify_count=count($notify_clients);
        // dd($notify_clients);
        view()->share('notify_clients', $notify_clients);
        view()->share('notify_count', $notify_count);
    }
}
