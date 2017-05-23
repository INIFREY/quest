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

    Route::get('/quests', 'QuestController@showList'); // Просмотр списка квестов
    Route::post('/quest/pay_coins', 'QuestController@payCoins'); // Оплата квеста монетами
    Route::post('/quest/pay_money', 'QuestController@payMoney'); // Оплата квеста деньгами
    Route::get('/quest/{id}', 'QuestController@index'); // Просмотр квеста
    Route::get('/play/{id}', 'QuestController@play'); // Игра

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
        Route::get('/admins', 'AdminController@admins');
        Route::get('/quests', 'AdminController@quests');
        Route::post('/quest/{id}', 'AdminController@editQuest');
        Route::get('/quest/{id}', 'AdminController@quest');
        Route::get('/quest/{id}/tasks', 'AdminController@tasks');

        Route::post('/ajax/users', 'AjaxController@users');
        Route::post('/ajax/admins', 'AjaxController@admins');
        Route::post('/ajax/edit/admin/{id}', 'AjaxController@adminEdit');
        Route::post('/ajax/quests', 'AjaxController@quests');
        Route::post('/ajax/tasks', 'AjaxController@tasks');
    });
});
