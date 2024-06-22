<?php

use Illuminate\Support\Facades\Route;

####  admin #######################
// Auth::routes();
use App\Helpers\DateHelper;
 Route::get('admin-login', 'Auth\LoginController@LoginAdmin')->name('admin-login');
Route::group(['middleware' => 'auth', 'namespace' => 'Admin','prefix' => 'admin'], function () {        
   Route::resource('roles','RoleController');
   Route::resource('users','UserController');
   Route::resource('properties','PropertyController');
   Route::resource('clients','ClientController'); 
   
   Route::get('property/clients/{id}', 'ClientController@propertyClients');
   Route::get('clients/print/{id}', 'ClientController@print')->name('clients.print');
   Route::get('client/closed', 'ClientController@clientClosed');
   Route::post('client/renew', 'ClientController@clientRenew')->name('client.renew');

   Route::resource('receipts','ReceiptController'); 
   Route::get('clients/receipts/{id}', 'ReceiptController@clientReceipts');
   Route::get('receipts/print/{id}', 'ReceiptController@print');

    Route::resource('expenses','ExpenseController');
    Route::get('clients/expenses/{id}', 'ExpenseController@clientExpenses');
    Route::get('expenses/print/{id}', 'ExpenseController@print');

    Route::resource('reports','ReportController');
    Route::get('report/print', 'ReportController@index')->name('report.print');
    // Route::get('report-search', 'ReportController@print')->name('report.search');


    Route::get('/convert-date', function () {
        $gregorianDate = '2024-05-31'; // يمكنك أيضاً استلام هذا التاريخ كمدخل من المستخدم
        list($year, $month, $day) = explode('-', $gregorianDate);
    
        $hijriDate = DateHelper::gregorianToHijri($year, $month, $day);
    
        return "التاريخ الميلادي: $gregorianDate يوافق التاريخ الهجري: {$hijriDate['year']}-{$hijriDate['month']}-{$hijriDate['day']}";
    });

   Route::resource('products','ProductController');
   Route::resource('dashboard','DashBoardController');
   Route::resource('countries','CountryController');
   Route::resource('cities','CityController');
   Route::resource('states','StateController');
   
//    Route::get('/clients', function () {
//     return view('admin.clients.create');
//    });
//     Route::get('/clients/create', function () {
//         return view('admin.clients.create');
//     });

   Route::get('settings','SettingController@settings');
   Route::post('settings/update','SettingController@updateSettings');

    // Route::get('about', 'ProfileController@about'); 
    // Route::get('contact', 'ProfileController@contact');
    Route::get('contact', 'ProfileController@contact');
    Route::post('settings/contactdata','ProfileController@updateContactData');
    Route::get('profile', 'SettingController@index');
    Route::post('profile/update','SettingController@updateProfile');
    Route::post('user/changepassword', 'SettingController@changePassword')->name('user.changepassword');
    //      Route::post('user/changepassword', 'ProfileController@instructorChangePassword')->name('instructor.changepassword');    
   
}); 