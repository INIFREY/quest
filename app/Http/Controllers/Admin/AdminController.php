<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        return view('admin.dashboard', ['admin'=>Auth::guard('admin')->user()]);
    }

    public function users(){
        return view('admin.users', ['admin'=>Auth::guard('admin')->user()]);
    }
}