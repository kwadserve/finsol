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
use App\Models\Certification\UserCaDetail;
use App\Models\Certification\UserNetworthDetail;
use App\Models\Certification\UserTurnoverDetail;
 

class CertificationDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request, $userId)
    {
       
        $data['routeurl'] =  Helper::getBaseUrl($request);  
        $data['usersCa'] = UserCaDetail::select('*')->where('user_id',$userId)->orderBy('id', 'DESC')->get();
        $data['usersNetworth'] = UserNetworthDetail::select('*')->where('user_id',$userId)->orderBy('id', 'DESC')->get();
        $data['usersTurnover'] = UserTurnoverDetail::select('*')->where('user_id',$userId)->orderBy('id', 'DESC')->get();
        return view('admin.pages.users.certification.certification_dashboard')->with($data);
    }

    public function profile($userId)
    {
        $data['userId'] = $userId; 
        return view('admin.pages.users.profile')->with($data);
    }

    
    public function allProfile($name, $Id)
    {
        if($name=='ca'){
            $data['caDetails'] = UserCaDetail::find($Id);
            $data['caDocuments'] = Documents::where(['for_multiple' => 'CA'])->get();
        }

        if($name=='networth'){
        $data['networthDetails'] = UserNetworthDetail::find($Id);
        $data['networthDocuments'] = Documents::where(['for_multiple' => 'NETWORTH'])->get();
        }

        if($name=='turnover'){
            $data['turnoverDetails'] = UserTurnoverDetail::find($Id);
            $data['turnoverDocuments'] = Documents::where(['for_multiple' => 'TURNOVER'])->get();
            }
       
        $page['profilePage'] = $name; 
       
        return view('admin.pages.users.certification.profile.all_profiles')->with($data)->with($page);
    }

    public function allProfileDocDownload(Request $request, $userId){
         
        $files = $request->input('files'); 
        $id = $request->input('id'); 
        $commaValues = explode(",", $files);
        $formType = $request->input('form_type'); 
        $userDetails = User::find($userId);
        $useName = trim($userDetails->name).'-'.$userId; 
        $zipName = str_replace('/','-',$formType).'-'.$useName.'.zip';
        $folderPath = 'uploads/users/'.$useName.'/'.$formType.'/';  
        $zip = new \ZipArchive();
        $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        if (count($commaValues) > 1) {
            foreach ($commaValues as $file) {
                $filePath = $folderPath.$file;  
                if (File::exists($filePath)) {
                $fileContents = file_get_contents(public_path($filePath));
                $zip->addFromString(basename($file), $fileContents);
                }else {
                    return redirect('/admin/user/certification/details/'.$id)->with('filenotexist', 'File Not Exist!');
                }
            }
        } else {
            if(!empty($files)) {
                $filePath =  $folderPath.$files;   
                if (File::exists($filePath)) { 
                $fileContents = file_get_contents(public_path($filePath));
                $zip->addFromString(basename($files), $fileContents); 
                } else {
                return redirect('/admin/user/certification/details/'.$id)->with('filenotexist', 'File Not Exist!');
                }  
            } else  {
                return redirect('/admin/user/certification/details/'.$id)->with('filenotexist', 'File Not Exist!');
            }
        }
        $zip->close();
        return response()->download($zipName)->deleteFileAfterSend(true);
    }

    public function downloadGstFile(Request $request, $userId)
    {
        $files = $request->input('files'); 
    
        $gstId = $request->input('gst_id'); 
        $gst_type = $request->input('gst_type'); 
        
        
        $commaValues = explode(",", $files);
        $userDetails = User::find($userId);
        $useName = trim($userDetails->name).'-'.$userId; 
        $zipName = $gst_type.'-'.$useName.'.zip';
        $folderPath = 'uploads/users/'.$useName.'/Gst/'.$gst_type.'/'; 
        $zip = new \ZipArchive();
        $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        if (count($commaValues) > 1) {
            foreach ($commaValues as $file) {
                $filePath = $folderPath.$file;  
                if (File::exists($filePath)) {
                $fileContents = file_get_contents(public_path($filePath));
                $zip->addFromString(basename($file), $fileContents);
                }else {
                    return redirect('/admin/user/gsttype/details/'.$gstId)->with('filenotexistsection1', 'File Not Exist!');
                }
            }
        } else {
            if(!empty($files)) {
            $filePath =  $folderPath.$files;   
            if (File::exists($filePath)) { 
            $fileContents = file_get_contents(public_path($filePath));
            $zip->addFromString(basename($files), $fileContents); 
            } else {
            return redirect('/admin/user/gsttype/details/'.$gstId)->with('filenotexistsection1', 'File Not Exist!');
            }  
        } else  {
            return redirect('/admin/user/gsttype/details/'.$gstId)->with('filenotexistsection1', 'File Not Exist!');
        }

        }
        $zip->close();
        return response()->download($zipName)->deleteFileAfterSend(true);
    }

    public function statusview(Request $request){
       $for = $request['for'];
       $formtype = $request['formtype'];
       $id = $request['id'];  
       $details="";
        $modalBody =""; 
        $content ="";
       
        try{            
        if($formtype){ 
            
            if($formtype=="ca"){
                 
                $details = UserCaDetail::find($id); 
               
               
            }  else  if($formtype=="networth"){
                $details = UserNetworthDetail::find($id); 
            }
            if($formtype=="turnover"){
                $details = UserTurnoverDetail::find($id); 
            }
              
            $content =  '<label>Number</label>
            <input type="text" class="form-control" name="company_number"  required="required" value=""  placeholder="Enter the  Number" />
            <label>Name of Company</label>
            <input type="text"  required="required" class="form-control" id="nameoftan" name="name" value="'.$details->name.'"  placeholder="Name" />';
             
 
        if(isset($details)){
            if($for ==='note'){
                $modalBody = 
                '<input type="hidden" name="userid" id="userid" value="'.$details->user_id.'" />
                <input type="hidden" id="id" name="id" value="'.$details->id.'" />
                <input type="hidden" name="routeis" id="routeis" value="'.$formtype.'" />
                <input type="hidden" name="type" value="note" />';
                } else {
                 $modalBody = 
                 '<input type="hidden" name="userid" id="userid" value="'.$details->user_id.'" />
                 <input type="hidden" id="id" name="id" value="'.$details->id.'" />
                 <input type="hidden" name="routeis" value="'.$formtype.'" />
                 <input type="hidden" name="type" value="approve" />';

                 $modalBody .=  $content; 
                }
            }
            return response()->json(['modalBody' => $modalBody]);
        }
    }  catch (\Exception $e) {
        // Log::error('An error occurred: ' . $e->getMessage());
        return redirect()->back()->with('error', 'An error occurred. Please try again later.');
    }
    }


  
     // change note to quary raised, and query updated to approve 
     public function change_status(Request $request){ 
      
         $userId =  $request->userid;
         $userDetails = User::find($userId);
         $useName = $userDetails->name.'-'.$userId;
         $route = $request->routeis;  
         $fName="";
       switch($route){
          case "ca" : 
            $panid = $request->id;
            $datas = UserCaDetail::find($panid);
            $fName = "Ca";
            break; 

        case "networth" : 
            $panid = $request->id;
            $datas = UserNetworthDetail::find($panid);
            $fName = "Networth";
            break; 

        case "turnover" : 
            $panid = $request->id;
            $datas = UserTurnoverDetail::find($panid);
            $fName = "Turnover";
            break; 
                              
          default : break; 
       }
            $folderNameChange =  ($request->type == 'approve') ? '/'.$fName.'/ApprovedImg' :'/'.$fName.'/RaisedImg' ;
            $folderName =  'uploads/users/'.$useName.$folderNameChange; 
            // $panid = $request->id;
            // $datas = UserPanDetail::find($panid);
            $status = ($request->type == 'approve') ? 4 : 2; 
            $datas->last_update_by = 'admin'; 
            $datas->status = $status;  // Approved
             if($request->type == 'approve') {
                $img = Helper :: uploadImagesNormal($request, $userId, $folderName,'approved_img');
                $datas->name =   $request->name;
                $datas->company_number =  $request->company_number;  
                $datas->approved_img = $img['approved_img'];
             } else {
                $img = Helper :: uploadImagesNormal($request, $userId, $folderName,'raised_img');
                $datas->admin_note = $request->admin_note; 
                $datas->raised_img = $img['raised_img'];
             }
            $datas->save();
       return redirect('admin/user/certification/dashboard/details/'.$userId)->with('success', 'Uploaded the Document!'); 
     }

     // download quary updated file 
     public function additionalFile(Request $request, $userId){
        $files = $request->input('files'); 
        $commaValues = explode(",", $files);
        $userDetails = User::find($userId);
        $formType = $request->form_type; 
        
        $useName = trim($userDetails->name).'-'.$userId; 
        $zipName = $formType."QueryUpdatedFile-".$useName.'.zip';
        $zip = new \ZipArchive();
        $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        if (count($commaValues) > 1) {
            foreach ($commaValues as $file) {
                $filePath = 'uploads/users/'.$useName.'/'.$formType.'/'.'AdditionalImg/'.$file;  
                if (File::exists($filePath)) {
                $fileContents = file_get_contents(public_path($filePath));
                $zip->addFromString(basename($file), $fileContents);
                }else {
                    return redirect('admin/user/certification/dashboard/details/'.$userId)->with('additionalfilenotexist', 'File Not Exist!');
                }
            }
        } else {
              $filePath = 'uploads/users/'.$useName.'/'.$formType.'/'.'AdditionalImg/'.$files;    
            if (File::exists($filePath)) { 
            $fileContents = file_get_contents(public_path($filePath));
            $zip->addFromString(basename($files), $fileContents); 
            } else {
            return redirect('admin/user/certification/dashboard/details/'.$userId)->with('additionalfilenotexist', 'File Not Exist!');
            }  
        }
        $zip->close();
        return response()->download($zipName)->deleteFileAfterSend(true);
     }

     // download approved file for admin
     public function approvedFile(Request $request, $userId){
      
        $files = $request->input('files'); 
        $commaValues = explode(",", $files);
        $userDetails = User::find($userId);
        $formType = $request->form_type; 
        
        $useName = trim($userDetails->name).'-'.$userId; 
        $zipName = $formType."ApprovedFile-".$useName.'.zip';
        $zip = new \ZipArchive();
        $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        if (count($commaValues) > 1) {
            foreach ($commaValues as $file) {
                $filePath = 'uploads/users/'.$useName.'/'.$formType.'/'.'ApprovedImg/'.$file;  
                if (File::exists($filePath)) {
                $fileContents = file_get_contents(public_path($filePath));
                $zip->addFromString(basename($file), $fileContents);
                }else {
                    return redirect('admin/user/certification/dashboard/details/'.$userId)->with('approvedfilenotexist', 'File Not Exist!');
                }
            }
        } else {
            $filePath = 'uploads/users/'.$useName.'/'.$formType.'/'.'ApprovedImg/'.$files;   
            if (File::exists($filePath)) { 
            $fileContents = file_get_contents(public_path($filePath));
            $zip->addFromString(basename($files), $fileContents); 
            } else {
            return redirect('admin/user/certification/dashboard/details/'.$userId)->with('approvedfilenotexist', 'File Not Exist!');
            }  
        }
        $zip->close();
        return response()->download($zipName)->deleteFileAfterSend(true);
     }
}