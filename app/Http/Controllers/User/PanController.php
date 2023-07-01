<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserPanDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class PanController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        echo "asdads"; 
      //  return view('user.pages.gst.details');
    }
    public function register_form() {
     
        $data['panimages'] = Documents::where('for_multiple', 'PAN')->get();
        return view('user.pages.pan.panform')->with($data);
    }
  
    public function storePan(Request $request) {
         
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Pan';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'PAN');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_pan'] = $request['pan_name'];
        $data['mobile_number'] = $request['mobile_number'];
        $matchthese = ['user_id' => $userId];
        // UserPanDetail::where($matchthese)->delete();
        UserPanDetail::updateOrCreate($data);
        return redirect('/pan/register')->with('success', 'Registered Pan successfully!');
    }


    public function queryRaised(Request $request){
        $userId = auth()->user()->id;
        $gstid = $request->gstid; 
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Gst/AdditionalImg';
        $name='additional_img';
        $img = Helper :: uploadImagesNormal($request, $userId, $folderName, $name);
      
        $datas = UserGstDetail::find($gstid);
       
        $datas->user_note = $request->user_note; 
        $datas->status = 3; // Query Updated      
        $datas->last_update_by = 'user'; 
        $datas->last_update_by_id =  $userId;
        $datas->additional_img = $img['additional_img']; 
        $datas->save();
        return redirect('/gst/business')->with('success', 'Uploaded the Document!');
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
    


       // $fileName = $request->input('files'); 
       // $userId = auth()->user()->id;
       // $useName = trim(auth()->user()->name).'-'.$userId; 
       // $filePath = 'uploads/users/'.$useName.'/Gst/ApprovedImg/'.$fileName;  
       // if (File::exists($filePath)) {
       //     $headers = [
       //         // 'Content-Type' => 'application/pdf',
       //         'Content-Type' => 'image/jpeg',
       //     ];
       //     return Response::download($filePath, $fileName,$headers);
       // } else {
       //     abort(404);
       // }
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