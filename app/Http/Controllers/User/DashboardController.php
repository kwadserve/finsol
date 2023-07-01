<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserPanDetail;
use App\Models\UserGstDetail;
use App\Models\UserTanDetail;
use App\Models\UserGstUploadDocument;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class DashboardController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(Request $request) {
        $userId = auth()->user()->id;
        $data['userGstDetails'] = UserGstDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
        $data['userPanDetails'] = UserPanDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
        $data['userTanDetails'] = UserTanDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
        $data['userUploadeDocuments'] = UserGstUploadDocument::where('user_id',$userId)->orderBy('id', 'DESC')->paginate(5);
        return view('user.pages.dashboard.dashboard')->with($data);  
    }

    
    public function queryRaised(Request $request){
        $userId = auth()->user()->id;
        $formType = $request->form_type;
        $id ="";
        if($formType =='Pan'){
            $id = $request->id;
        }
       
        if($id) {
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/'.$formType.'/AdditionalImg';
        $name='additional_img';
        $img = Helper :: uploadImagesNormal($request, $userId, $folderName, $name);
        if($formType =='Pan'){
            $datas = UserPanDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 
        return redirect('/dashboard')->with('success', 'Uploaded the Document!');
       }  
    }

    public function approvedFile(Request $request){

       $files = $request->input('files'); 
       $commaValues = explode(",", $files);
       $userId = auth()->user()->id;
       $useName = trim(auth()->user()->name).'-'.$userId; 
       $zipName = 'QueryApprovedFile-'.$useName.'.zip';
       $zip = new \ZipArchive();
       $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
       if (count($commaValues) > 1) {
           foreach ($commaValues as $file) {
               $filePath = 'uploads/users/'.$useName.'/Gst/ApprovedImg/'.$file;  
               if (File::exists($filePath)) {
               $fileContents = file_get_contents(public_path($filePath));
               $zip->addFromString(basename($file), $fileContents);
               }else {
                   return redirect('/gst/business')->with('approvedfilenotexist', 'File Not Exist!');
               }
           }
       } else {
           $filePath = 'uploads/users/'.$useName.'/Gst/ApprovedImg/'.$files; 
           if (File::exists($filePath)) { 
           $fileContents = file_get_contents(public_path($filePath));
           $zip->addFromString(basename($files), $fileContents); 
           } else {
           return redirect('/gst/business')->with('approvedfilenotexist', 'File Not Exist!');
           }  
       }
       $zip->close();
       return response()->download($zipName)->deleteFileAfterSend(true);
    }

    public function raisedFile(Request $request){
        $files = $request->input('files'); 
        $commaValues = explode(",", $files);
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $zipName = 'QueryRaisedFile-'.$useName.'.zip';
        $zip = new \ZipArchive();
        $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        if (count($commaValues) > 1) {
            foreach ($commaValues as $file) {
                $filePath = 'uploads/users/'.$useName.'/Gst/RaisedImg/'.$file;  
                if (File::exists($filePath)) {
                $fileContents = file_get_contents(public_path($filePath));
                $zip->addFromString(basename($file), $fileContents);
                }else {
                    return redirect('/gst/business')->with('raisedfilenotexist', 'File Not Exist!');
                }
            }
        } else {
            $filePath = 'uploads/users/'.$useName.'/Gst/RaisedImg/'.$files; 
            if (File::exists($filePath)) { 
            $fileContents = file_get_contents(public_path($filePath));
            $zip->addFromString(basename($files), $fileContents); 
            } else {
            return redirect('/gst/business')->with('raisedfilenotexist', 'File Not Exist!');
            }  
        }
        $zip->close();
        return response()->download($zipName)->deleteFileAfterSend(true);
    }
 
     
}