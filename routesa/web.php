<?php

use Illuminate\Support\Facades\Route;


use App\User;

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


Route::get('/', function () {
    // return view('front.front');
    // dd('xxm');
    return view('front.front',['data' => '']);
});


Route::get('/insert', function() {
    $students = app('firebase.firestore')->database()->collection('users')->documents();
      // dd($students);
    $stuRef = app('firebase.firestore')->database()->collection('users')->newDocument();
    $stuRef->set([
        'firstname' => 'Seven',
        'lastname' => 'Stac',
    ]);
    echo "<h1>".'inserted'."</h1>";
});



Route::get('get-collection', 'FirebaseController@hamadaindex');
Route::get('google-login', 'GoogleLoginController@redirectToGoogle')->name('google.redirect');
Route::get('/google/callback', 'GoogleLoginController@handleGoogleCallback')->name('google.callback');



Route::get('/data-t', 'DataController@process');


  Route::get('/myanswer', function () {
    // return view('front.front');
    return view('front.myanswer');
});

// Route::any('/{any?}', 'AppController@show')->where('any', '^((?!admin|api).)*$');

// Route::any('{any}', function ($any) {
//     return view('front.front');
// })->where('any', '^((?!admin).)*$');

Route::get('{any}',function($any){

      return view('front.front',['data' => '']);
  })->where('any','^((?!admin|api|activation|myanswer).)*$');

  // Route::get('{any}',function($any){
  //     return view('front.frontt');
  // })->where('any','.*');
  



Route::get('lang/{locale}', 'LocalizationController@index');






//--start firebase-------------------
    // Route::get('/allmyuser', function() {
    //      $students = app('firebase.firestore')->database()->collection('User');
    //      rint_r($students);
    // });
    //
    // Route::get('/insert', function() {
    //      $stuRef = app('firebase.firestore')->database()->collection('User')->newDocument();
    //      $stuRef->set([
    //         'firstname' => 'hamada',
    //         'lastname' => 'ali',
    //         'age'    => 19
    //      ]);
    //      echo "<h1>".'inserted'."</h1>";
    // });
    //
    // Route::get('/display', function(){
    //     $student = app('firebase.firestore')->database()->collection('User')->document('2b7e2c4eb51548aaa844')->snapshot();
    //   print_r('Student ID ='.$student->id());
    //   print_r("<br>". 'Student Name = '.$student->data()['firstname']);
    //   print_r("<br>".'Student Age = '.$student->data()['age']);
    // });
    //
    // Route::get('/update', function(){
    //   $student = app('firebase.firestore')->database()->collection('User')->document('2b7e2c4eb51548aaa844')
    //  ->update([
    //   ['path' => 'age', 'value' => '18']
    //  ]);
    //  echo "<h1>".'updated'."</h1>";
    // });
    //
    // Route::get('/delete', function(){
    //  app('firebase.firestore')->database()->collection('User')->document('738007291ed44c49b7ca')->delete();
    //  echo "<h1>".'deleted'."</h1>";
    // });
    //
    // Route::resource('/crud', App\Http\Controllers\CrudController::class);
    // Route::get('get-collection', [FirebaseController::class, 'hamadaindex']);
//--end firebase-----------
