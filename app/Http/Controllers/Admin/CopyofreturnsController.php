<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserGstDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;
use App\Models\User;
use App\Models\CopyOfReturns;
use App\Models\GstFormType;
use Illuminate\Support\Facades\File;
 
use App\Helpers\Helper as Helper;

class CopyofreturnsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index($userId, Request $request)
    {
        $data['routeUrl'] = Helper::getBaseUrl($request); 
        $data['copyofreturns'] = CopyOfReturns::where('user_id',$userId)->orderBy('id', 'DESC')->get();
        $data['gstNumbers'] =  UserGstDetail::select('gst_number')->whereNotNull('gst_number')->where('user_id',$userId)->get();
        $data['formTypes'] =  GstFormType::select('type')->get();
        $data['userId'] =  $userId;
        return view('admin.pages.copyofreturns.copyofreturnslist')->with($data);
    }

    public function getTradeName(Request $request){
        $gstNumber = $request->input('gst');
        $tradeName = UserGstDetail::select('id', 'trade_name')->where(['gst_number'=>$gstNumber])->get()->first();
        return response()->json($tradeName);
    }

    public function Create($userId, Request $request){
       
        $userData =  User::find($userId);
        $gstId = UserGstDetail::where('gst_number',$request->gstnumber)->where('user_id',$userId)->first();
        $useName = $userData->name.'-'.$userId; 
      
        $folderName = 'uploads/users/'.$useName.'/Gst/CopyOfReturns';
        $data = Helper :: uploadImagesNormal($request, $userId, $folderName,'documents');
        $data['gst_number'] =  $request->gstnumber;
        $data['user_gst_id'] =  $request->gstid;
        $data['user_id'] =  $userId;
        $data['form_type'] = $request->formtype;
        $data['trade_name'] =  isset($gstId->trade_name) ? $gstId->trade_name :'' ; 
        $data['year'] = $request->year;
        if($request->doc_type=='Monthly'){
            $data['month'] = isset($request->month)?$request->month:'';
        } else {
            $data['quarter'] =  isset($request->month) ? $request->quarter:'';
        }
        $lastInsertedId =  CopyOfReturns::Create($data)->id;
        $msg = $request->input('doc_type').' Copy of return Successfully Updated!'; 
         return redirect('/admin/user/gst/copyofreturns/'.$userId)->with('success', $msg); 
  
    }

    public function adminusercopyofreturnsFile(Request $request, $userId)
    {
        $files = $request->input('files'); 
        $commaValues = explode(",", $files);
        $userDetails = User::find($userId);
   
        $doc_type = $request->doc_type;
        $useName = trim($userDetails->name).'-'.$userId; 
        $zipName = $doc_type.'-'.$useName.'.zip';
        $zip = new \ZipArchive();
        $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        if (count($commaValues) > 1) {
            foreach ($commaValues as $file) {
                $filePath = 'uploads/users/'.$useName.'/Gst/UploadDocuments/'.$doc_type.'/'.$file;  
                if (File::exists($filePath)) {
                $fileContents = file_get_contents(public_path($filePath));
                $zip->addFromString(basename($file), $fileContents);
                }else {
                    return redirect('user/gst/uploaddocuments/'.$userId)->with('danger', 'File Not Exist!');
                }
            }
        } else {
            $filePath = 'uploads/users/'.$useName.'/Gst/UploadDocuments/'.$doc_type.'/'.$files;  
            if (File::exists($filePath)) { 
            $fileContents = file_get_contents(public_path($filePath));
            $zip->addFromString(basename($files), $fileContents); 
            } else {
            return redirect('user/gst/uploaddocuments/'.$userId)->with('filenotexist', 'File Not Exist!');
            }  
        }
        $zip->close();
        return response()->download($zipName)->deleteFileAfterSend(true);
    }

    // public function change_approve(Request $request,  $docId){
        
    //     if(isset($docId)){
           
    //         $UserGstUploadDocument =  UserGstUploadDocument::find($docId);
    //         $userid =  $UserGstUploadDocument->user_id; 
    //         $UserGstUploadDocument->status = 2; //Approve Upload Documents
    //         $UserGstUploadDocument->save();
    //         return 1; 
    //         // return redirect('admin/user/gst/uploaddocuments/'.$userId)->with('success', 'Approved the Document Successfuly!'); 
    //     }
        
       
    // }

    // public function adminuserUploadDocumentFile(Request $request, $userId){
    //     $files = $request->input('files'); 
    //     $commaValues = explode(",", $files);
    //     $userDetails = User::find($userId);
   
    //     $doc_type = $request->doc_type;
    //     $useName = trim($userDetails->name).'-'.$userId; 
    //     $zipName = $doc_type.'-'.$useName.'.zip';
    //     $zip = new \ZipArchive();
    //     $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
    //     if (count($commaValues) > 1) {
    //         foreach ($commaValues as $file) {
    //             $filePath = 'uploads/users/'.$useName.'/Gst/UploadDocuments/'.$doc_type.'/'.$file;  
    //             if (File::exists($filePath)) {
    //             $fileContents = file_get_contents(public_path($filePath));
    //             $zip->addFromString(basename($file), $fileContents);
    //             }else {
    //                 return redirect('user/gst/uploaddocuments/'.$userId)->with('danger', 'File Not Exist!');
    //             }
    //         }
    //     } else {
    //         $filePath = 'uploads/users/'.$useName.'/Gst/UploadDocuments/'.$doc_type.'/'.$files;  
    //         if (File::exists($filePath)) { 
    //         $fileContents = file_get_contents(public_path($filePath));
    //         $zip->addFromString(basename($files), $fileContents); 
    //         } else {
    //         return redirect('user/gst/uploaddocuments/'.$userId)->with('filenotexist', 'File Not Exist!');
    //         }  
    //     }
    //     $zip->close();
    //     return response()->download($zipName)->deleteFileAfterSend(true);
    // }
 
 
   
}