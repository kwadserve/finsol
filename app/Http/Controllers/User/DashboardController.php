<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserPanDetail;
use App\Models\UserGstDetail;
use App\Models\UserTanDetail;
use App\Models\UserEpfDetail;
use App\Models\UserEsicDetail;
use App\Models\UserHufDetail;
use App\Models\UserTrustDetail;
use App\Models\UserTrademarkDetail;
use App\Models\UserCompanyDetail;
use App\Models\UserUdamyDetail;
use App\Models\UserPartnershipDetail;
use App\Models\UserGstUploadDocument;
use App\Models\UserImportExportDetail;
use App\Models\UserFactoryLicenseDetail;
use App\Models\UserLabourDetail;
use App\Models\UserShopDetail; 
use App\Models\UserIsoDetail; 
use App\Models\Documents;
use App\Models\UserFssaiDetail; 
use App\Models\UserItrDetail; 
use App\Models\UserTdsDetail; 
use App\Models\UserTaxauditDetail; 
use App\Helpers\Helper as Helper;
use Illuminate\Support\Facades\File;

 
class DashboardController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(Request $request) {
        $userId = auth()->user()->id;
       
        $data['userGstDetails'] = UserGstDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
       
        $data['userPanDetails'] = UserPanDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
       
        $data['userTanDetails'] = UserTanDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
       
        $data['userEpfDetails'] = UserEpfDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();

        $data['userEsicDetails'] = UserEsicDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
        
        $data['userTrademarkDetails'] = UserTrademarkDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();

        $data['userCompanyDetails'] = UserCompanyDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();

        $data['userPartnershipDetails'] = UserPartnershipDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();

        $data['userHufDetails'] = UserHufDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();

        $data['userTrustDetails'] = UserTrustDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();

        $data['userUdamyDetails'] = UserUdamyDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();

        $data['userImportExportDetails'] = UserImportExportDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();

        $data['userLabourDetails'] = UserLabourDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();

        $data['userShopDetails'] = UserShopDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
 
        $data['userIsoDetails'] = UserIsoDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
 
        $data['userFssaiDetails'] = UserFssaiDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
 
        $data['userItrDetails'] = UserItrDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
 
        $data['userTaxauditDetails'] = UserTaxauditDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
 
        $data['userTdsDetails'] = UserTdsDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
 
        $data['userFactoryLicenseDetails'] = UserFactoryLicenseDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
 
       // $data['userUploadeDocuments'] = UserGstUploadDocument::where('user_id',$userId)->orderBy('id', 'DESC')->paginate(5);
        return view('user.pages.dashboard.dashboard')->with($data);  
    }
 
    public function queryRaised(Request $request){
        $userId = auth()->user()->id;
        $formType = $request->form_type;
        $id = $request->id;    
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
        if($formType =='Tan'){
            $datas = UserTanDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 
        if($formType =='Epf'){
            $datas = UserEpfDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 

        if($formType =='Esic'){
            $datas = UserEsicDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 

        if($formType =='Trademark'){
            $datas = UserTrademarkDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 

        
        if($formType =='Company'){
            $datas = UserCompanyDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 


        if($formType =='Partnership'){
            $datas = UserPartnershipDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 

        if($formType =='Huf'){
            $datas = UserHufDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 

        if($formType =='Trust'){
            $datas = UserTrustDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 


        if($formType =='Udamy'){
            $datas = UserUdamyDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 

        if($formType =='ImportExport'){
            $datas = UserImportExportDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 

        if($formType =='Labour'){
            $datas = UserLabourDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        }
        if($formType =='Shop'){
            $datas = UserShopDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 

        if($formType =='Iso'){
            $datas = UserIsoDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 

        if($formType =='Fssai'){
            $datas = UserFssaiDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 

        if($formType =='Itr'){
            $datas = UserItrDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 

        if($formType =='Taxaudit'){
            $datas = UserTaxauditDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 

        if($formType =='Tds'){
            $datas = UserTdsDetail::find($id);
            $datas->user_note = $request->user_note; 
            $datas->status = 3; // Query Updated      
            $datas->last_update_by = 'user'; 
            $datas->last_update_by_id =  $userId;
            $datas->additional_img = $img['additional_img']; 
            $datas->save();
        } 

        if($formType =='FactoryLicense'){
            $datas = UserFactoryLicenseDetail::find($id);
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
       $formType = $request->form_type;
       $zipName = $formType.'ApprovedFile-'.$useName.'.zip';
       $zip = new \ZipArchive();
       $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
       if (count($commaValues) > 1) {
           foreach ($commaValues as $file) {
               $filePath = 'uploads/users/'.$useName.'/'.$formType.'/'.'ApprovedImg/'.$file;  
               if (File::exists($filePath)) {
               $fileContents = file_get_contents(public_path($filePath));
               $zip->addFromString(basename($file), $fileContents);
               }else {
                   return redirect('/dashboard')->with('approvedfilenotexist', 'File Not Exist!');
               }
           }
       } else {
           $filePath = 'uploads/users/'.$useName.'/'.$formType.'/'.'ApprovedImg/'.$files; 
           if (File::exists($filePath)) { 
           $fileContents = file_get_contents(public_path($filePath));
           $zip->addFromString(basename($files), $fileContents); 
           } else {
           return redirect('/dashboard')->with('approvedfilenotexist', 'File Not Exist!');
           }  
       }
       $zip->close();
       return response()->download($zipName)->deleteFileAfterSend(true);
    }

    public function raisedFile(Request $request){
        $files = $request->input('files'); 
        $commaValues = explode(",", $files);
        $userId = auth()->user()->id;
        $formType = $request->form_type;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $zipName = $formType.'QueryRaisedFile-'.$useName.'.zip';
        $zip = new \ZipArchive();
        $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        if (count($commaValues) > 1) {
            foreach ($commaValues as $file) {
                $filePath = 'uploads/users/'.$useName.'/'.$formType.'/'.'RaisedImg/'.$file;  
                if (File::exists($filePath)) {
                $fileContents = file_get_contents(public_path($filePath));
                $zip->addFromString(basename($file), $fileContents);
                }else {
                    return redirect('/dashboard')->with('raisedfilenotexist', 'File Not Exist!');
                }
            }
        } else {
            $filePath = 'uploads/users/'.$useName.'/'.$formType.'/'.'RaisedImg/'.$files; 
            if (File::exists($filePath)) { 
            $fileContents = file_get_contents(public_path($filePath));
            $zip->addFromString(basename($files), $fileContents); 
            } else {
            return redirect('/dashboard')->with('raisedfilenotexist', 'File Not Exist!');
            }  
        }
        $zip->close();
        return response()->download($zipName)->deleteFileAfterSend(true);
    }
  
}