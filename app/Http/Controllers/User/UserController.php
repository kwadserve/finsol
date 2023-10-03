<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data['settings'] = UserSetting::where(['user_id' => $userId, 'type'=>'Upload Document'])->get();
        return view('user.pages.settings.uploaddoc')->with($data);
    }

    public function profile()
    {
        $user = auth()->user();
        return view('user.pages.profile.profile', compact('user'));
    }

    public function user_settings()
    {
        $user = Auth::user();
        return view('user.pages.profile.settings', compact('user'));
    }

    public function save_settings(Request $request)
    {
        return redirect('settings');
    }
}