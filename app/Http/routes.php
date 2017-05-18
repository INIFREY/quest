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
    Route::get('/profile/edit', 'Profile\ProfileController@edit'); // Редактирование профиля
    Route::get('/profile/{id}', [  // Просмотр профиля
        'as' => 'profile',
        'uses' => 'Profile\ProfileController@index'
    ]);
    Route::get('/profile',function(){ // Просмотр своего профиля
        return redirect()->route('profile', ['id' => Auth::user()->id]);
    });
    Route::post('/profile/edit/general', 'Profile\ProfileController@editGeneral')->name('profileEditGeneral'); // Редактировать основные настройки
    Route::post('/profile/edit/photo', 'Profile\ProfileController@editPhoto')->name('profileEditPhoto'); // Редактировать основные настройки
    Route::post('/profile/edit/password', 'Profile\ProfileController@editPassword')->name('profileEditPassword'); // Редактировать пароль
    Route::post('/profile/edit/social', 'Profile\ProfileController@editSocial')->name('profileEditSocial'); // Редактировать ссылки на соц. сети

});

Route::get('/email/sendActivate', 'Profile\EmailController@sendActivate'); // Отправка письма активации
Route::get('/email/activate/{token}/email={email}', 'Profile\EmailController@activate'); // Активация почты
Route::post('/email/change', 'Profile\EmailController@change'); // Изменение почты



// Админка
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function()
{
    Route::get('/login','AuthController@showLoginForm');
    Route::post('/login','AuthController@login');
   
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/', 'AdminController@index');
        Route::get('/logout','AuthController@logout');
        Route::get('/users', 'AdminController@users');
    });
});
