<?php

namespace App\Http\Controllers\User\LoanFinance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LoanFinance\CMA;
use App\Models\LoanFinance\Estimated;
use App\Models\LoanFinance\ProjectReport;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $userId = auth()->user()->id;
        $data['estimated'] = Estimated::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
        $data['cma'] = CMA::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
        $data['projectReport'] = ProjectReport::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
        return view('user.pages.loanfinance.dashboard.dashboard')->with($data);  
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
        if($formType =='CMA'){
            $datas = CMA::find($id); 
        }
        if($formType =='LFProjectReport'){
            $datas = ProjectReport::find($id); 
        }
        if($formType =='LFEstimated'){
            $datas = Estimated::find($id); 
        }
        $datas->user_note = $request->user_note; 
        $datas->status = 3; // Query Updated      
        $datas->last_update_by = 'user'; 
        $datas->last_update_by_id =  $userId;
        $datas->additional_img = $img['additional_img']; 
        $datas->save();
        return redirect('/loan-finance/dashboard')->with('success', 'Uploaded the Document!');
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
                   return redirect('/loan-finance/dashboard')->with('givenfilenotexist', 'File Not Exist!');
               }
           }
       } else {
           $filePath = 'uploads/users/'.$useName.'/'.$formType.'/'.'ApprovedImg/'.$files; 
           if (File::exists($filePath)) { 
           $fileContents = file_get_contents(public_path($filePath));
           $zip->addFromString(basename($files), $fileContents); 
           } else {
           return redirect('/loan-finance/dashboard')->with('givenfilenotexist', 'File Not Exist!');
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
                    return redirect('/loan-finance/dashboard')->with('givenfilenotexist', 'File Not Exist!');
                }
            }
        } else {
            $filePath = 'uploads/users/'.$useName.'/'.$formType.'/'.'RaisedImg/'.$files; 
            if (File::exists($filePath)) { 
            $fileContents = file_get_contents(public_path($filePath));
            $zip->addFromString(basename($files), $fileContents); 
            } else {
            return redirect('/loan-finance/dashboard')->with('givenfilenotexist', 'File Not Exist!');
            }  
        }
        $zip->close();
        return response()->download($zipName)->deleteFileAfterSend(true);
    }
}
