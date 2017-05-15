<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        return view('admin.dashboard', ['aId'=>Auth::guard('admin')->user(), 'uId'=>Auth::user()]);
    }
}