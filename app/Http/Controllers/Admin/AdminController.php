<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\Quest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Admin;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        return view('admin.dashboard', ['admin'=>Auth::guard('admin')->user()]);
    }

    public function users(){
        $users = User::all();
        return view('admin.users', ['admin'=>Auth::guard('admin')->user(), 'users'=>$users]);
    }

    public function admins(){
        $admins = Admin::all();
        return view('admin.admins', ['admin'=>Auth::guard('admin')->user(), 'admins'=>$admins]);
    }

    public function quests(){
        $quests = Quest::all();
        return view('admin.quests', ['admin'=>Auth::guard('admin')->user(), 'quests'=>$quests]);
    }

    public function quest($id){
        if($id=="new") $quest = false;
        else $quest = Quest::findOrFail($id);

        return view('admin.quest', ['admin'=>Auth::guard('admin')->user(), 'quest'=>$quest]);
    }

    public function editQuest(Request $request, $id){

        $data = Input::all();
        $inputs = [
            'name'=>$data['name'],
            'coins'=>$data['coins'],
            'money'=>$data['money'],
            'free'=>isset($data['free'])?"1":"0",
            'start_date'=>Carbon::parse($data['start_date'])->format('Y-m-d H:i:00'),
            'end_date'=>Carbon::parse($data['end_date'])->format('Y-m-d H:i:00'),
            'description'=>$data['description'],
            'text'=>$data['text'],
        ];

        if($id=="new") {
            $quest = Quest::create($inputs);
            return redirect('/admin/quests');
        } else {
            $quest = Quest::findOrFail($id);
            $quest->update($inputs);
        }
        return view('admin.quest', ['admin'=>Auth::guard('admin')->user(), 'quest'=>$quest]);
    }

    public function tasks($id){
        $quest = Quest::findOrFail($id);
        $tasks = $quest->allTasks();
        return view('admin.tasks', ['admin'=>Auth::guard('admin')->user(), 'tasks'=>$tasks, 'id'=>$id]);
    }
}