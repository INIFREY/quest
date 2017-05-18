<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use App\Models\SendCoins;
use App\Models\Email;
use Storage;

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
     *  Возвращает email пользователя
     */
    public function getEmailValue(){
        $email = Email::where('user_id', $this->id)->get()->last();
        return $email->value;
    }

    /**
     * @param $count - количество монет
     * @param $name - тип перевода 
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
     * @param $name - тип перевода
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

    /**
     *  Проверяет, есть ли у пользователя аватар 
     */
    public function hasAvatar(){
        if (!$this->avatar) return false;

        if (Storage::disk('img')->exists('avatars/'.$this->avatar)) return true;
        else return false;
    }

    /**
     *  Возвращает ссылку на аватар
     */
    public function getAvatarUrl(){
        if ($this->hasAvatar()) return url('img/avatars/'.$this->avatar);
        else return url('img/avatars/noavatar.png');
    }

    /**
     *  Возвращает баллы в процентах
     */
    public function getPercentPoints(){
        $max = User::max('points');
        return round ($this->points*100/$max);
    }

    /**
     *  Возвращает соц. сеть
     */
    public function getSoc($type){
        switch ($type){
            case "vk": return $this->vkontakte;
            case "fb": return $this->facebook;
            case "tw": return $this->twitter;
            default: return "";
        }
    }

    /**
     *  Возвращает ссылку на соц. сеть
     */
        public function getSocUrl($type){
        if(!$this->getSoc($type)) return "";

        switch ($type){
            case "vk": return "https://vk.com/".$this->vkontakte;
            case "fb": return "https://facebook.com/".$this->facebook;
            case "tw": return "https://twitter.com/".$this->twitter;
            default: return "";
        }
    }





}
