<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use App\Models\SendCoins;

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

    /**
     * @param $count
     * @param $name
     *
     *  Переводит монеты пользователю
     */
    public function sendCoins($count, $name){
        SendCoins::create([
            'count' => $count,
            'user_id' => $this->id,
            'name' => $name,
        ]);

        $this->coins += $count;
        $this->save();
    }

    /**
     * @param $name
     *
     *  Проверяет, был ли уже перевод такого типа у пользователя
     *
     * @return bool
     */
    public function wasEarlierCoin($name){
        $wasEarlier = SendCoins::where('user_id', $this->id)->where('name', $name)->first();
        if ($wasEarlier) return true;
        else return false;
    }



}
