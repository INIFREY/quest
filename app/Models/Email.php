<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mail;

class Email extends Model
{
    /**
     * Атрибуты, которые можно назначать по маске.
     *
     * @var array
     */
    protected $fillable = [
        'value', 'user_id', 'verified', 'token'
    ];

    /**
     * Атрибуты, которые должны быть скрыты для массивов.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];

    public $timestamps = false;

    /**
     *  Создает новый токен (ключ подтверждения)
     */
    public function newToken(){
        $this->token = str_random(30);
        $this->save();
    }

    /**
     * Проверяет, активирован ли такой адрес
     */
    public function valueVerified(){
        return $this->query()->where('value', $this->value)->where('verified', '1')->count();
    }

    /**
     * Отправляет письмо активации
     */
    public function sendActivateMail(){
        Mail::send('emails.email_activate', ['token' => $this->token, 'email'=>$this->value], function ($m)  {
            $m->to($this->value)->subject('Активація email');
        });
    }
}
