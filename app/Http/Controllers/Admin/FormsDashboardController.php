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
use App\Models\UserPartner;
use App\Models\UserDirector;
use App\Models\UserPanDetail;
use App\Models\UserTanDetail;

class FormsDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request, $userId)
    {
       
        $data['routeurl'] =  Helper::getBaseUrl($request);  
        $data['usersGst'] = UserGstDetail::select('*')->where('user_id',$userId)->orderBy('id', 'DESC')->get();
        $data['usersPan'] = UserPanDetail::select('*')->where('user_id',$userId)->orderBy('id', 'DESC')->get();
        $data['usersTan'] = UserTanDetail::select('*')->where('user_id',$userId)->orderBy('id', 'DESC')->get();
        return view('admin.pages.users.forms.forms_dashboard')->with($data);
    }

    public function profile($userId)
    {
        $data['userId'] = $userId; 
        return view('admin.pages.users.profile')->with($data);
    }

    
    public function allProfile($Id)
    {
        $data['panDetails'] = UserPanDetail::find($Id);
        $data['panDocuments'] = Documents::where(['for_multiple' => 'PAN'])->get();

        $data['tanDetails'] = UserTanDetail::find($Id);
        $data['tanDocuments'] = Documents::where(['for_multiple' => 'TAN'])->get();
     
       
        return view('admin.pages.users.forms.all_profiles')->with($data);
    }

    public function allProfileDocDownload(Request $request, $userId){
         
        $files = $request->input('files'); 
        $id = $request->input('id'); 
        $commaValues = explode(",", $files);
        $formType = $request->input('form_type'); 
        $userDetails = User::find($userId);
        $useName = trim($userDetails->name).'-'.$userId; 
        $zipName = $formType.'-'.$useName.'.zip';
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
                    return redirect('/admin/user/forms/details/'.$id)->with('filenotexist', 'File Not Exist!');
                }
            }
        } else {
            if(!empty($files)) {
                $filePath =  $folderPath.$files;   
                if (File::exists($filePath)) { 
                $fileContents = file_get_contents(public_path($filePath));
                $zip->addFromString(basename($files), $fileContents); 
                } else {
                return redirect('/admin/user/forms/details/'.$id)->with('filenotexist', 'File Not Exist!');
                }  
            } else  {
                return redirect('/admin/user/forms/details/'.$id)->with('filenotexist', 'File Not Exist!');
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
            
            if($formtype=="tan"){
                 
                $details = UserTanDetail::find($id); 
                $content =  '<label>Pan Number</label>
                <input type="text" class="form-control"  required="required" name=tan_number" value="" placeholder="Enter the Tan Number" />
                <label>Name of Pan</label>
                <input type="text"  required="required" class="form-control" id="nameoftan" name="name_of_tan" value="'.$details->name_of_tan.'"  placeholder="Name of Tan" />';
                 
               
            }  else if($formtype=="pan"){
                 
                $details = UserPanDetail::find($id);
                $content = '<label>Pan Number</label>
                <input type="text" class="form-control"  required="required" name=pan_number" value="" placeholder="Enter the Pan Number" />
                <label>Name of Pan</label>
                <input type="text"  required="required" class="form-control"  name="name_of_pan" value="'.$details->name_of_pan.'" placeholder="Name of Pan" />';
                 
                  }

 
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

    // get information based on all forms 
    public function statusviewold(Request $request){
        $queryParam = $request->all(); 
        $param =  key($queryParam); 
         switch($param){
            case "pan" : $panId = $queryParam[$param]; 
                  return UserPanDetail::find($panId); 
                break; 
            default : break; 
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

    
    // Delete Row 
    public function delete(Request $request)
    {
        $item_id = $request->get('item_id');
        $item = UserPanDetail::find($item_id);

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

     // change note to quary raised, and query updated to approve 
     public function change_status(Request $request){ 
         $userId =  $request->userid;
         $userDetails = User::find($userId);
         $useName = $userDetails->name.'-'.$userId;
         $route = $request->routeis;  
         
       switch($route){
          case "pan" : 
            $folderNameChange =  ($request->type == 'approve') ? '/Pan/ApprovedImg' :'/Pan/RaisedImg' ;
            $folderName =  'uploads/users/'.$useName.$folderNameChange; 
            $panid = $request->id;
            $datas = UserPanDetail::find($panid);
            $status = ($request->type == 'approve') ? 4 : 2; 
            $datas->last_update_by = 'admin'; 
            $datas->status = $status;  // Approved
             if($request->type == 'approve') {
                $img = Helper :: uploadImagesNormal($request, $userId, $folderName,'approved_img');
                $datas->name_of_pan =   $request->name_of_pan;
                $datas->pan_number =  $request->pan_number;  
                $datas->approved_img = $img['approved_img'];
             } else {
                $img = Helper :: uploadImagesNormal($request, $userId, $folderName,'raised_img');
                $datas->admin_note = $request->admin_note; 
                $datas->raised_img = $img['raised_img'];
             }
            $datas->save();
            break; 
            case "tan" : 
                $folderNameChange =  ($request->type == 'approve') ? '/Tan/ApprovedImg' :'/Tan/RaisedImg' ;
                $folderName =  'uploads/users/'.$useName.$folderNameChange; 
                $tanid = $request->id;
                $datas = UserTanDetail::find($tanid);
                $status = ($request->type == 'approve') ? 4 : 2; 
                $datas->last_update_by = 'admin'; 
                $datas->status = $status;  // Approved
                 if($request->type == 'approve') {
                    $img = Helper :: uploadImagesNormal($request, $userId, $folderName,'approved_img');
                    $datas->name_of_tan =   $request->name_of_tan;
                    $datas->tan_number =  $request->tan_number;  
                    $datas->approved_img = $img['approved_img'];
                 } else {
                    $img = Helper :: uploadImagesNormal($request, $userId, $folderName,'raised_img');
                    $datas->admin_note = $request->admin_note; 
                    $datas->raised_img = $img['raised_img'];
                 }
                $datas->save();
                break; 


          default : break; 
       }
       return redirect('admin/user/forms/dashboard/details/'.$userId)->with('success', 'Uploaded the Document!'); 
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
                    return redirect('admin/user/forms/dashboard/details/'.$userId)->with('additionalfilenotexist', 'File Not Exist!');
                }
            }
        } else {
              $filePath = 'uploads/users/'.$useName.'/'.$formType.'/'.'AdditionalImg/'.$files;    
            if (File::exists($filePath)) { 
            $fileContents = file_get_contents(public_path($filePath));
            $zip->addFromString(basename($files), $fileContents); 
            } else {
            return redirect('admin/user/forms/dashboard/details/'.$userId)->with('additionalfilenotexist', 'File Not Exist!');
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
                    return redirect('admin/user/forms/dashboard/details/'.$userId)->with('approvedfilenotexist', 'File Not Exist!');
                }
            }
        } else {
            $filePath = 'uploads/users/'.$useName.'/'.$formType.'/'.'ApprovedImg/'.$files;   
            if (File::exists($filePath)) { 
            $fileContents = file_get_contents(public_path($filePath));
            $zip->addFromString(basename($files), $fileContents); 
            } else {
            return redirect('admin/user/forms/dashboard/details/'.$userId)->with('approvedfilenotexist', 'File Not Exist!');
            }  
        }
        $zip->close();
        return response()->download($zipName)->deleteFileAfterSend(true);
     }
}