<?php

namespace App\Http\Middleware;

use App\Models\Email;
use Closure;
use Illuminate\Support\Facades\Auth;

class EmailVerifyMiddleware
{
    /**
     * Провека, есть ли у пользователя подтвержденный email
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user(); // Получаем авторизированного пользователя
        $email = Email::where('user_id', $user->id)->get()->last(); // Берем его последнюю почту
        if ($email && $email->verified==1) return $next($request); // Проверяем активная ли она. Если да - пропускаем
        return response(view('email_verify')); // Если нет - переброс на подтверждение
    }
}
