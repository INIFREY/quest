<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Phone;
use App\Models\Email;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Mail;

class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    protected $redirectTo = '/admin';

    protected $guard = 'admin';


    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }
}
