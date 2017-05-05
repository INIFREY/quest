<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\Email;
use Mail;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function sendActivate(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $user = Auth::user(); // Получаем авторизированного пользователя
        $email = Email::where('user_id', $user->id)->get()->last(); // Берем его последнюю почту
        if(!$email->token) $email->newToken();
        if($email->valueVerified()) return ['status'=>'error', 'msg'=>"verified"];

        $email->sendActivateMail();

        return ['status'=>'success'];
    }

    public function activate($token, $mail){
        $user = Auth::user(); // Получаем авторизированного пользователя
        $email = Email::where('user_id', $user->id)->get()->last(); // Берем его последнюю почту
        if($email->verified==1) return redirect('/profile');
        if($email->valueVerified()) return view('email_verify', ['error'=>true,'errVerified'=>true]);
        if($email->value!=$mail || $email->token!=$token) return view('email_verify', ['error'=>true,'errLink'=>true]);
        $email->verified=1;
        $email->save();
        return redirect('/profile');
    }

    public function change(Request $request){
        if(!$request->ajax()) return redirect('/');

        $this->validate($request, [
            'email' => 'required|email|max:255|unique:emails,value,NULL,id,verified,1',
        ], [
            'email.unique' => 'Такий email вже зареєстровано!',
        ]);

        $user = Auth::user(); // Получаем авторизированного пользователя
        $email = Email::where('user_id', $user->id)->get()->last(); // Берем его последнюю почту
        if ($request->input('email')==$email->value) return ['status'=>'error', 'msg'=>"old"];
        $email->value=$request->input('email');
        $email->newToken();
        $email->verified=0;
        $email->save();
        $email->sendActivateMail();

        return ['status'=>'success'];
    }
}
