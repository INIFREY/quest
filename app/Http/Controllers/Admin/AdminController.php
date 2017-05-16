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
        setlocale(LC_TIME, 'uk-UA.utf8');
        $tt = Carbon::now()->formatLocalized('%A %d %B %Y');
        return view('admin.dashboard', ['admin'=>Auth::guard('admin')->user(), 't'=>$tt]);
    }
}