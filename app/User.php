<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    /**
     * Атрибуты, которые можно назначать по маске.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'login', 'password', 'birth', 'sex'
    ];

    /**
     * Атрибуты, которые должны быть скрыты для массивов.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     *  Возвращает возраст пользователя
     */
    public function getAge(){
        $birth = new Carbon($this->birth);
        $today = Carbon::now();
        return $today->diffInYears($birth);
    }

    /**
     *  Возвращает кол-во дней с момента регистрации
     */
    public function getRegDays(){
        $reg = new Carbon($this->created_at);
        $today = Carbon::now();
        return $today->diffInDays($reg);
    }



}
