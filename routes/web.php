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
