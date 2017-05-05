<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Phone;
use App\Models\Email;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Mail;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Регистрация и вход в систему Controller
    |--------------------------------------------------------------------------
    |
    | Этот контроллер обрабатывает регистрацию новых пользователей, а также
    | а также аутентификацию существующих пользователей. По умолчанию этот контроллер использует
    | простой признак, чтобы добавить эти поведения. Почему бы вам не исследовать его?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Куда перенаправить пользователей после входа / регистрации.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Создание нового экземпляра контроллера аутентификации.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Получить валидатор для запроса входящей регистрации.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data['phone'] = preg_replace('/[^0-9]/', '', $data['phone']);

        return Validator::make($data, [
            'name' => 'required|max:255',
            'login' => 'required|alpha_dash|max:25|min:3|unique:users',
            'email' => 'required|email|max:255|unique:emails,value,NULL,id,verified,1',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|size:12|unique:phones,value,NULL,id,verified,1',
            'birth' => 'required|date',
            'sex' => 'required|min:1',
            'g-recaptcha-response' => 'required|captcha'
        ], [
            'login.unique' => 'Такий логін вже зареєстровано!',
            'email.unique' => 'Такий email вже зареєстровано!',
            'phone.unique' => 'Такий телефон вже зареєстровано!',
            'phone.size' => 'Номер телефону невірний!',
        ]);
    }

    /**
     * Создать новый экземпляр пользователя после валидной регистрации.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $data['phone'] = preg_replace('/[^0-9]/', '', $data['phone']);

        $user =  User::create([
            'name' => $data['name'],
            'login' => $data['login'],
            'birth' => $data['birth'],
            'sex' => $data['sex'],
            'password' => bcrypt($data['password']),
        ]);


        Phone::create([
            'value' => $data['phone'],
            'user_id' => $user->id,
        ]);

        $email = Email::create([
            'value' => $data['email'],
            'user_id' => $user->id,
            'token' => str_random(30),
        ]);

        $email->sendActivateMail();


        return $user;
    }
}
