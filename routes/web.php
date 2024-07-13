<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Admin\DashBoardController@index');

Route::get('home', 'Admin\DashBoardController@index');
Route::get('property/{status}', 'Admin\DashBoardController@property');










// $tomorrow = Carbon::tomorrow()->format('Y-m-d');
//         $datenow=Carbon::now()->format('Y-m-d');

//         $notify_clients = [];
//         $towday_clients = Client::where('end_date',$tomorrow)->with('properties')->get();
//         foreach ($towday_clients as $towday) {
//             $towday->time_out="two day";
//             $notify_clients[] = $towday;
//         }
        
//         $one_clients = Client::where('end_date',$datenow)->with('properties')->get();
//         foreach ($one_clients as $item) {
//             $item->time_out="one day";
//             $notify_clients[] = $item;
//         }
//         $notify_count=count($notify_clients);
//         // dd($notify_clients);
//         view()->share('notify_clients', $notify_clients);
//         view()->share('notify_count', $notify_count);