<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserGstDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;
use App\Models\User;
use App\Helpers\Helper as Helper;

class UserGstController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        // View::share('action', 'no_add');
        // View::share('nav', 'users');
    }

    public function index($userId)
    {
        $data['usersGst'] = UserGstDetail::select(
            'trade_name',
            'mobile_linked_aadhar',
            'status',
            'gst_type',
            'id'
        )->where('user_id',$userId)->orderBy('id', 'DESC')->get();
       
        return view('admin.pages.users.gst')->with($data);
    }

    public function ajax()
    {
        $items = UserGstDetail::select(
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
        $item = UserGstDetail::find($item_id);
        if(empty($item)){
            return redirect()->route('admin.dashboard');
        }

        return view('admin.pages.users.show', [
            'item' => $item,
        ]);
    }

    

    public function delete(Request $request)
    {
        $item_id = $request->get('item_id');
        $item = UserGstDetail::find($item_id);

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

     public function change_status(Request $request){ 
         $userId =  $request->userid;
        if($request->type == 'approve'){
        
         $gstid = $request->gstid; 
         $userDetails = User::find($userId);
         $useName = $userDetails->name.'-'.$userId;
         $folderName = 'uploads/users/'.$useName.'/Gst/ApprovedImg';
         $img = Helper :: uploadImagesNormal($request, $userId, $folderName,'approved_img');
         
         $datas = UserGstDetail::find($gstid);
         $datas->last_update_by = 'admin'; 
         $datas->status = 3; 
         $datas->gst_number =  $request->gst_number;  
        //  $datas->last_update_by_id =  $userId;
         $datas->approved_img = $img['approved_img'];
         $datas->save();
        } else {
         $gstid = $request->gstid; 
         $datas = UserGstDetail::find($gstid);
         $datas->note = $request->note; 
         $datas->last_update_by = 'admin'; 
         $datas->status = 2; 
         $datas->save();
        }
        return redirect('admin/user/gst/details/'.$userId)->with('success', 'Uploaded the Document!'); 
     }
}