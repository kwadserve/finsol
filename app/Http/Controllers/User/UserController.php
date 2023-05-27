<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserSetting;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        return view('user.home');
    }

    public function settings(){
        $userId = auth()->user()->id;
        $data['settings'] = UserSetting::where('user_id',$userId)->get(); 
        return view('user.pages.settings.uploaddoc');
    }
}