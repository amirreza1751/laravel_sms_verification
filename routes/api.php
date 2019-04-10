<?php

use GuzzleHttp\Client;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});



Route::post('/send_otp','API\OtpController@send_otp');

Route::get('/date', function(){

    $mytime = Carbon\Carbon::now();
//    echo $mytime->toDateTimeString();
    $send_date = \App\PhoneNumberToken::where('phone_number','09126774496')->latest()->first()->created_at;
    echo $mytime->diffInMinutes($send_date->toDateTimeString());
});


Route::get('/signin', function(){
    $variable = \App\PhoneNumberToken::where('phone_number','09126774496')->where('used','0')->latest()->first();
    if ($variable == null){
        return "null";
    } else return "not null";
});

