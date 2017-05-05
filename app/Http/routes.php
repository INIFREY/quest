<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['middleware' => ['auth','email.verify']], function () {
    Route::get('/home', 'HomeController@index');
});

Route::get('/email/sendActivate', 'Profile\EmailController@sendActivate'); // Отправка письма активации
Route::get('/email/activate/{token}/email={email}', 'Profile\EmailController@activate'); // Активация почты
Route::post('/email/change', 'Profile\EmailController@change'); // Изменение почты

