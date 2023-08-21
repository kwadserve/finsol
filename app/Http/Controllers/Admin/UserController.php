<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;
use App\Models\State;
use App\Helpers\Helper as Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        // View::share('action', 'no_add');
        // View::share('nav', 'users');
    }

    public function index()
    {
        $data['users'] = User::select(
            'name',
            'image',
            'status',
            'email',
            'id'
        )->orderBy('id', 'DESC')->get();
       
        return view('admin.pages.users.index')->with($data);
    }

    public function ajax()
    {
        $items = User::select(
            'name',
            'image',
            'status',
            'email',
            'id'
        )->orderBy('id', 'DESC');

        return DataTables::of($items)->make(true);
    }

    public function show($item_id)
    {
        $item = User::find($item_id);
        if(empty($item)){
            return redirect()->route('admin.dashboard');
        }

        return view('admin.pages.users.show', [
            'item' => $item,
        ]);
    }

    public function change_status(Request $request)
    {
        $item_id = $request->get('item_id');
        $item = User::find($item_id);

        if(empty($item)) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found!',
            ], 404);
        } else {
            if($item->status == User::ACTIVE || $item->status == User::NOT_ACTIVE){
                $item->status = ($item->status == User::ACTIVE ? User::NOT_ACTIVE : User::ACTIVE);
                $item->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Item status successfully changed.',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Item not found!',
                ], 404);
            }
        }
    }

    public function delete(Request $request)
    {
        $item_id = $request->get('item_id');
        $item = User::find($item_id);

        if(empty($item)) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found!',
            ], 404);
        } else {
            $item->delete();

            return response()->json([
                'success' => true,
                'message' => 'Item successfully deleted.',
            ], 200);
        }
    }

    public function addUserForm(Request $request){
        $states = State::all();
        $routeUrl = Helper::getBaseUrl($request);
        return view('admin.auth.register',compact('states','routeUrl'));
    }

    
    protected function validator(array $data)
    {
         
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }

    public function addUser(Request $request){
        $this->validator($request->all())->validate();
        $inputs=$request->all();
        $inputs['password']=Hash::make($inputs['password']);
        User::create($inputs);
        return redirect('admin/users/all')->with(['message' => 'User Created successfully']);
    }

}