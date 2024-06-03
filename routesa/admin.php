<?php

use Illuminate\Support\Facades\Route;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
####  admin #######################
Auth::routes();



Route::get('admin-login', 'Auth\LoginController@LoginAdmin')->name('admin-login');

	Route::get('/activation/users/{token}', 'Api\HomeController@userActivation');

	Route::get('/activation/message', function(){
		return view('front.activate');
	})->name('activation.message');

// API ID
//api_0b5d3b67-b2b3-4d76-b9d2-15de2755f70a

// API Version ID
// apiversion_84d2658b-e6fc-45f8-9875-8716a2c2a1ff

	Route::group(['prefix' => 'admin'], function () {

    // Route::get('forgot/password', 'Auth\UserLoginController@forgotPassword');
    // Route::post('forgot/password', 'Auth\UserLoginController@submitForgot')->name('forgot.password.post');
		//
	    Route::get('reset-user-password/{token}', 'Auth\UserLoginController@resetUserPasswordGet')->name('reset-user-password');
	    Route::post('reset-user-password', 'Auth\UserLoginController@resetUserPasswordPost')->name('reset-user-password-post');

// 2982|V3EXbIhIPhAdM1WY87znKVZS57kledfJyLbENI1Z
	    	Route::get('/send-otp', function(){


			$curl = curl_init();

			curl_setopt_array($curl, [
				CURLOPT_URL => "https://whatsapp-otp-verification.p.rapidapi.com/auth/client-request-otp",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => "phone=201015024714&country=EG&message=Your%20OTP%3A%20*%7Bcode%7D*%20-%20You%20have%20*5%20minutes*%20to%20enter%20this%20code",
				CURLOPT_HTTPHEADER => [
					"X-RapidAPI-Host: whatsapp-otp-verification.p.rapidapi.com",
					"X-RapidAPI-Key: 7e840e8ec9mshe876dabeed464d0p1d8bccjsneb6d367c8e0d",
					"content-type: application/x-www-form-urlencoded"
				],
			]);

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				echo $response;
			}



		});

	    	Route::get('/verify-otp', function(){



			$curl = curl_init();

			curl_setopt_array($curl, [
				CURLOPT_URL => "https://whatsapp-otp-verification.p.rapidapi.com/auth/client-verify-otp",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => "requestId=%3CREQUIRED%3E&otp=%3CREQUIRED%3E",
				CURLOPT_HTTPHEADER => [
					"X-RapidAPI-Host: whatsapp-otp-verification.p.rapidapi.com",
					"X-RapidAPI-Key: 7e840e8ec9mshe876dabeed464d0p1d8bccjsneb6d367c8e0d",
					"content-type: application/x-www-form-urlencoded"
				],
			]);

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				echo $response;
			}



		});

	});
	Route::group(['middleware' => 'auth', 'namespace' => 'Admin','prefix' => 'admin'], function () {


		
		Route::resource('quizes','QuizeController');
		Route::get('quize/{id}','QuizeController@quizeBySet');
		
		Route::get('get_group_name/{id}','QuizeController@getGroupName');
		Route::resource('sets','SetController');

		    Route::resource('roles','RoleController');
		    Route::resource('users','UserController');
		    Route::resource('levels','LevelController');
		    Route::resource('exams','ExamController');
		    Route::get('telc-exams','ExamController@telcExams');
		    Route::resource('questions','QuestionController');
				Route::get('questionsTelc','QuestionController@questionsTelc');
		    Route::resource('subquestions','SubQuestionController');
		    Route::get('allsubquestions/{id}','SubQuestionController@allSubquestions');
			Route::get('exam/goethe/{id}','UserController@examsGoethe');
			Route::get('exam/telc/{id}','UserController@examsTelc');
			Route::get('allexam','UserController@allexam');

		    Route::resource('answers','AnswerController');



		    Route::post('settings/update','ProfileController@updateSettings');
		    Route::resource('dashboard','DashBoardController');
		    Route::resource('countries','CountryController');
		    Route::resource('cities','CityController');


		    Route::post('student-change-password', 'StudentController@studentChangePassword');









		    Route::get('all-emails','InstructorController@allEmails');
		    Route::get('all-students-emails','StudentController@allStudentsEmails');




		Route::get('settings', 'ProfileController@settings');
		Route::post('settings/update','ProfileController@updateSettings');

		Route::get('certificate', 'ProfileController@certificatePrice');
		Route::post('certificate_price/update','ProfileController@updateCertificatePrice');

        Route::get('contact', 'ProfileController@contact');
        Route::post('settings/contactdata','ProfileController@updateContactData');

        Route::get('privacy', 'ProfileController@privacy');
        Route::post('settings/privacy','ProfileController@updatePrivacy');

        Route::get('agreements', 'ProfileController@agreements');
        Route::post('update/agreements','ProfileController@updateAgreement');

        Route::get('agreement_student', 'ProfileController@agreement_student');
        Route::post('update/agreement_student','ProfileController@updateAgreement_student');


        Route::get('terms', 'ProfileController@terms');
        Route::post('update/terms','ProfileController@updateTerms');


        Route::get('return_policy', 'ProfileController@return_policy');
        Route::post('update/return_policy','ProfileController@updateReturn_policy');

        Route::get('cancellation-policy', 'ProfileController@cancellation_policy');
        Route::post('update/cancellation-policy','ProfileController@updateCancellationPolicy');

        Route::get('delivery-policy', 'ProfileController@delivery_policy');
        Route::post('update/delivery-policy','ProfileController@updateDeliveryPolicy');

		    Route::get('profile', 'ProfileController@index');
		    Route::post('profile/update','ProfileController@updateProfile');
		    Route::post('user/changepassword', 'ProfileController@changePassword')->name('user.changepassword');

	    Route::get('/admin', function () {
			    return "iuhiuhhkj";
		});

		Route::group(['prefix' => 'student'],function (){
				Route::get('/users', function () {
				    return "iuhiuhhkj";
				});
		});


});







 ###################### user-status ##############################
        // Route::post('users/status/{id}', 'UsersController@updateStatus')->name('users/status/{id}');


        ###################### admin-profile ##############################
