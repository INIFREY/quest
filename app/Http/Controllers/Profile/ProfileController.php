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

        $this->validate($request, [
            'photo' => 'required|max:2050|image'
        ]);

        $avatar = $request->file('photo');

        Storage::disk('public')->put(
            'avatars/'.Auth::user()->id.".".$avatar->getClientOriginalExtension(),
            file_get_contents($avatar->getRealPath())
        );

        $result = ['status'=>'success'];
        return $result;
    }

}
