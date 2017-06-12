<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class QuestController extends Controller
{
    public function index($id){
        $quest = Quest::findOrFail($id);
        return view('quest', ['quest'=>$quest]);
    }

    public function showList(){
        $quests = Quest::all();
        return view('quests', ['quests'=>$quests]);
    }

    public function play($id){
        $quest = Quest::findOrFail($id);
        $user = Auth::user();
        if (!$quest->isPlayer($user->id)) abort(404);
        if (!$quest->isStart()) abort(404);
        
        $task = $quest->getTask($user->id);

        if ($task=='finish') return view('play_finish', ['quest'=>$quest]);

        return view('play', ['task'=>$task]);
    }

    public function payCoins(Request $request){
        if(!$request->ajax()) return redirect('/');
        $quest = Quest::findOrFail($request->input('id'));
        $user = Auth::user();
        if ($quest->finished()) return ['status'=>'error', 'msg'=>"Квест вже закінчився!"];
        if ($user->coins<$quest->coins) return ['status'=>'error', 'msg'=>"У вас не достатня кількість монет!"];

        $user->minusCoins($quest->coins);
        $quest->addPlayer($user->id);
        return ['status'=>'success'];
    }

    public function answer(Request $request, $id){
        $quest = Quest::findOrFail($id);
        $user = Auth::user();
        if (!$quest->isPlayer($user->id)) abort(404);
        if (!$quest->isStart()) abort(404);

        $task = $quest->getTask($user->id);

        $this->validate($request, [
            'answer' => 'required',
        ]);

        if ($task->answer == $request->input('answer')) {
            $quest->nextTask($user->id);
            return redirect('/play/'.$quest->id);
        };

        return view('play', ['task'=>$task, 'error'=>true]);
    }
}
