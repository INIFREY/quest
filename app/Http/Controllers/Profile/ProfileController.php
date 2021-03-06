<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Storage;

class ProfileController extends Controller
{

    public function index($id)
    {
        $user = User::findOrFail($id);
        $canEdit = false;
        if ($user->id == Auth::user()->id)  $canEdit = true;
        return view('profile', ['user'=>$user, 'canEdit'=>$canEdit]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile_edit', ['user'=>$user]);
    }

    public function editGeneral(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $this->validate($request, [
            'name' => 'required|max:255',
            'about' => 'max:255'
        ]);

        $user = Auth::user(); // Получаем авторизированного пользователя
        $user->name  = $request->input('name');
        $user->about  = $request->input('about');
        $user->save();

        $result = ['status'=>'success'];
        if( $request->input('name')!="" && $request->input('about')!="" && !$user->wasEarlierCoin("editGeneral")) {
            $user->sendCoins("5", "editGeneral");
            $result['money']='success';
            $result['moneyCount']='5';
        }
        return $result;
    }

    public function editPassword(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        $data = Input::all();

        if (Hash::check($data['password'], $user->password)){
            $user->password = bcrypt($data['new_password']);
            $user->save();
            return ['status'=>'success'];
        } else {
            return ['status'=>'error', 'msg'=>"Старий пароль неправильний!"];
        }

    }

    public function editPhoto(Request $request){
        if(!$request->ajax()) return redirect('/');

        $user = Auth::user();

        if (!$request->file('photo')){
            $user->avatar = "";
            $user->save();
            return ['status'=>'success'];
        }

        $this->validate($request, [
            'photo' => 'max:2050|image'
        ]);

        $avatar = $request->file('photo');
        $fileName = rand(1000, 9999).$user->id.".jpg";

        if($user->hasAvatar()) Storage::disk('img')->delete('avatars/'.$user->avatar);

        Storage::disk('img')->put(
            'avatars/'.$fileName,
            file_get_contents($avatar->getRealPath())
        );

        $user->avatar = $fileName;
        $user->save();

        $result = ['status'=>'success'];
        if (Storage::disk('img')->exists('avatars/'.$fileName) && !$user->wasEarlierCoin("editPhoto")) {
            $user->sendCoins("5", "editPhoto");
            $result['money']='success';
            $result['moneyCount']='5';
        }


        return $result;
    }

    public function editSocial(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $this->validate($request, [
            'vk' => 'max:255|regex:/vk.com/',
            'fb' => 'max:255|regex:/facebook.com/',
            'tw' => 'max:255|regex:/twitter.com/'
        ]);

        $user = Auth::user(); // Получаем авторизированного пользователя
        $user->vkontakte  = $request->input('vk') ?  explode("vk.com/", $request->input('vk'))[1] : "";
        $user->facebook  = $request->input('fb') ?  explode("facebook.com/", $request->input('fb'))[1] : "";
        $user->twitter  = $request->input('tw') ?  explode("twitter.com/", $request->input('tw'))[1] : "";
        $user->save();

        $result = ['status'=>'success'];
        if( $user->vkontakte!="" && $user->facebook!="" && $user->twitter!="" && !$user->wasEarlierCoin("editSocial")) {
            $user->sendCoins("5", "editSocial");
            $result['money']='success';
            $result['moneyCount']='5';
        }
        return $result;
    }

}
