<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\UserGstDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper as Helper;
use App\Models\User;
use App\Models\Documents; 
 

class UserGstController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        // View::share('action', 'no_add');
        // View::share('nav', 'users');
    }

    public function index(Request $request, $userId)
    {
       
        $data['routeurl'] =  Helper::getBaseUrl($request);  
        $data['usersGst'] = UserGstDetail::select(
            'trade_name',
            'mobile_linked_aadhar',
            'status',
            'gst_type',
            'type',
            'gst_number',
            'admin_note',
            'user_note',
            'user_id',
            'additional_img',
            'id'
        )->where('user_id',$userId)->orderBy('id', 'DESC')->get();
       
        return view('admin.pages.users.gst')->with($data);
    }

    public function profile($userId)
    {
        $data['userId'] = $userId; 
        return view('admin.pages.users.profile')->with($data);
    }

    
    public function gstProfile($gstId)
    {
        $data['gstDetails'] = UserGstDetail::find($gstId);
        $data['gstIndividualDocuments'] = Documents::where(['for_multiple' => 'GST'])->get();
        return view('admin.pages.users.gst.gstprofile')->with($data);
    }


    public function statusview($item_id){
         

        if($item_id){
        $singleGst = UserGstDetail::find($item_id);
         return $singleGst; 
        //return view('admin.pages.users.modal')->with($data);
        }
    }

    public function ajax()
    {
        $items = UserGstDetail::select(
            'name',
            'image',
            'status',
            'gst_number',
            'admin_note',
            'user_note',
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
         $userDetails = User::find($userId);
         $useName = $userDetails->name.'-'.$userId;
         $gstid = $request->gstid; 
        if($request->type == 'approve'){
        
            $validatedData = $request->validate([
                'gst_number' => 'required',
            ]);

         $folderName = 'uploads/users/'.$useName.'/Gst/ApprovedImg';
         $img = Helper :: uploadImagesNormal($request, $userId, $folderName,'approved_img');
         
         $datas = UserGstDetail::find($gstid);
         $datas->last_update_by = 'admin'; 
         $datas->status = 4;  // Approved
         $datas->trade_name = ($request->trade_name)??$request->trade_name; 
         $datas->gst_number =  $request->gst_number;  
         $datas->approved_img = $img['approved_img'];
         $datas->save();
        } else {

          
         $folderName = 'uploads/users/'.$useName.'/Gst/RaisedImg';
         $img = Helper :: uploadImagesNormal($request, $userId, $folderName,'raised_img');
 
         $datas = UserGstDetail::find($gstid);
         $datas->admin_note = $request->admin_note; 
         $datas->last_update_by = 'admin'; 
         $datas->raised_img = $img['raised_img'];
         $datas->status = 2; 
         $datas->save();
        }
        return redirect('admin/user/gst/details/'.$userId)->with('success', 'Uploaded the Document!'); 
     }

     public function additionalFile(Request $request, $userId){
        $files = $request->input('files'); 
        $commaValues = explode(",", $files);
        $userDetails = User::find($userId);
   
        
        $useName = trim($userDetails->name).'-'.$userId; 
        $zipName = "QueryUpdatedFile-".$useName.'.zip';
        $zip = new \ZipArchive();
        $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        if (count($commaValues) > 1) {
            foreach ($commaValues as $file) {
                $filePath = 'uploads/users/'.$useName.'/Gst/AdditionalImg/'.$file;  
                if (File::exists($filePath)) {
                $fileContents = file_get_contents(public_path($filePath));
                $zip->addFromString(basename($file), $fileContents);
                }else {
                    return redirect('user/gst/details/'.$userId)->with('additionalfilenotexist', 'File Not Exist!');
                }
            }
        } else {
            $filePath = 'uploads/users/'.$useName.'/Gst/AdditionalImg/'.$files;  
            if (File::exists($filePath)) { 
            $fileContents = file_get_contents(public_path($filePath));
            $zip->addFromString(basename($files), $fileContents); 
            } else {
            return redirect('user/gst/details/'.$userId)->with('additionalfilenotexist', 'File Not Exist!');
            }  
        }
        $zip->close();
        return response()->download($zipName)->deleteFileAfterSend(true);
     }
}