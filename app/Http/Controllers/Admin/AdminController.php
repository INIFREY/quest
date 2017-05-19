<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
}