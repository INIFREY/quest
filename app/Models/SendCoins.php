<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SendCoins extends Model
{
    protected $table = 'sends_coins';

    protected $fillable = [
        'name', 'count', 'user_id'
    ];

}
