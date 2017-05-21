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

        return view('play', ['quest'=>$quest]);
    }
}
