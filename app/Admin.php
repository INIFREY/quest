<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class Admin extends Authenticatable
{
    /**
     * Атрибуты, которые можно назначать по маске.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'login', 'password'
    ];

    /**
     * Атрибуты, которые должны быть скрыты для массивов.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRoleName(){
        switch ($this->role){
            case 'administrator': return "Адміністратор";
            case 'editor': return "Редактор";
            default: return "Користувач";
        }
    }



}
