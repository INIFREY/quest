<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Admin;

class AjaxController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){

    }

    public function users(Request $request){
        if(!$request->ajax()) return redirect('/');
        $users = User::all();
        return view('admin.ajax.users_table', ['users'=>$users]);
    }

    public function admins(Request $request){
        if(!$request->ajax()) return redirect('/');
        $admins = Admin::all();
        return view('admin.ajax.admins_table', ['admins'=>$admins]);
    }

    public function adminEdit(Request $request, $id){
        if(!$request->ajax()) return redirect('/');
        if ($id=="no") $target=null;
        else $target = Admin::findOrFail($id);

        return view('admin.ajax.admin_form', ['target'=>$target]);
    }

    public function quests(Request $request){
        if(!$request->ajax()) return redirect('/');
        $quests = Quest::all();
        return view('admin.ajax.quests_table', ['quests'=>$quests]);
    }

    public function tasks(Request $request, $id){
        if(!$request->ajax()) return redirect('/');
        $quest = Quest::findOrFail($id);
        $tasks = $quest->allTasks();

        return view('admin.ajax.tasks_table', ['tasks' => $tasks, 'id'=>$id]);
    }

    
}