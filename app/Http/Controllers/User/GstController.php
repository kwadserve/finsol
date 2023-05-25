<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\UserGstDetail;
use App\Models\Documents;
use App\Models\UserPartner;
use App\Models\UserDirector;
use App\Models\CopyOfReturns;
use App\Helpers\Helper as Helper;
use DB; 

class GstController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
       // \DB::enableQueryLog();
        $userId = auth()->user()->id;
        $data['userGstDetails'] = UserGstDetail::whereIn('status',[2,3])->orWhere('id',$userId)->get()->first();
      //   dd(\DB::getQueryLog());
        // dd($data);
        return view('user.pages.gst.details')->with($data);
    }
    public function register_form() {
        $data['images'] = Documents::where(['for_multiple' => 'GST'])->get();
        $data['firm_images'] = Documents::where(['for_multiple' => 'GST Firm'])->get();
        $data['firm_partner_images'] = Documents::where(['for_multiple' => 'GST Firm Partner'])->get();
        $data['company_images'] = Documents::where(['for_multiple' => "'GST Company"])->get();
        $data['company_director_images'] = Documents::where(['for_multiple' => 'GST Company Director'])->get();
        return view('user.pages.gst.form')->with($data);
    }
    public function uploadAllImages($request, $userId, $gst_type_val, $folderName) {
        $userFolder = $folderName;
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0777, true, true);
        }
        $allimages = Documents::where('gst_type_val', $gst_type_val)->get();
        $data = [];
        foreach ($allimages as $img) {
            $keyname = $img['doc_key_name'];
            $imgName = str_replace(' ', '', $img['doc_name']);
            if ($request->hasFile($keyname)) {
                $images = $request->file($keyname);
                $related_imgs = [];
                foreach ($images as $index => $image) {
                    $newName = $imgName . '_' . ($index + 1) . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $path = $image->move($userFolder, $newName);
                    $related_imgs[] = $newName;
                }
                $data[$keyname] = implode(',', $related_imgs);
            }
        }
        return $data;
    }
    public function storeIndividual(Request $request) {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Gst/Individual';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'GST');
        // $data = $this->uploadAllImages($request, $userId, 1, $folderName);
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['gst_type'] = $request['gst_type'];
        $data['trade_name'] = $request['trade_name'];
        $data['status'] = 1 ; //1- Under Process/2- Query Raised/3-Approved
        $matchthese = ['user_id' => $userId, 'gst_type' => 'Individual'];
        UserGstDetail::where($matchthese)->delete();
        UserGstDetail::updateOrCreate($matchthese, $data);
        return redirect('/gst/register')->with('success', 'Registered as Individual successfully!');;
    }
    public function storeFirm(Request $request) {
   
        $userId = auth()->user()->id;
        $dataon ='partners'; 
            $useName = trim(auth()->user()->name).'-'.$userId; 
            $folderName = 'uploads/users/'.$useName.'/Gst/Firm';
            $data = Helper :: uploadImagesNew($request, $userId, $folderName,'GST Firm');
            // $data =  $this->uploadAllImages($request,$userId,2,$folderName);
            $data['user_id'] = $userId;
            $data['email_id'] = $request['email_id'];
            $data['gst_type'] = $request['gst_type'];
            $data['trade_name'] = $request['trade_name'];
            $data['status'] = 1 ;
            $matchthese = ['user_id'=>$userId, 'gst_type'=>'Firm'];
            UserGstDetail::where($matchthese)->delete();
            $lastInsertedId =  UserGstDetail::updateOrCreate($matchthese, $data)->id;
        if ($request->has('partners')) {
            $partners = $request->input('partners');
            UserPartner::where(['user_id' => $userId])->delete();
            foreach ($partners as $key => $ps) {
                $folderName = 'uploads/users/'.$useName.'/Gst/Firm/Partners';
               
                $partner = Helper :: uploadAddMultipleImages($request, $key,  $userId, $folderName, $dataon, 'GST Firm Partner');
                // $partner =  $this->uploadPartnerImages($request, $key, $userId,   $folderName,$dataon,'GST Firm Partner');
                $partner['user_gst_id'] =  $lastInsertedId;
                $partner['user_id'] =  $userId;
                $partner['partner_email'] = $ps['email'];
                $partner['partner_mobile'] = $ps['mobile'];
                UserPartner::Create($partner);
            }
        }
        return redirect('/gst/register')->with('success', 'Registered as Firm successfully!');
    }

    public function uploadPartnerImages($request, $key, $userId, $gst_type_val, $folderName,$dataon,$for_partner_director) {

        $userFolder = $folderName;
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0777, true, true);
        }
        $allimages = Documents::where(['gst_type_val' => $gst_type_val, 'for_partner_director' => $for_partner_director])->get();
         
        foreach ($allimages as $img) {
            if ($request->file($dataon)) {
                $keyname = $img['doc_key_name'];
                $imgName = str_replace(' ', '', $img['doc_name']);
               $images = $request->file($dataon)[$key];
                $related_imgs = [];
                if (isset($images[$keyname])) {
                    foreach ($images[$keyname] as $index => $p) {
                        $newName = $imgName . '_' . ($index + 1) . '_' .($key).'_'. time() . '.' . $p->getClientOriginalExtension();
                        $imagePath = $p->move($folderName, $newName);
                        $related_imgs[] = $newName; 
                    }
                }
                
            }
          $data[$keyname] =  implode(',', $related_imgs);
        } 
        return $data;
    }
 

 
    
    public function storeCompany(Request $request) {
            $userId = auth()->user()->id;
            $dataon ='directors'; 
            $useName = trim(auth()->user()->name).'-'.$userId; 
            $folderName = 'uploads/users/'.$useName.'/Gst/Company';
            $data = Helper :: uploadImagesNew($request, $userId, $folderName,'GST Company');
            // $data =  $this->uploadAllImages($request,$userId,2,$folderName);
            $data['user_id'] = $userId;
            $data['email_id'] = $request['email_id'];
            $data['gst_type'] = $request['gst_type'];
            $data['trade_name'] = $request['trade_name'];
            $data['status'] = 1 ;
            $matchthese = ['user_id'=>$userId, 'gst_type'=>'Company'];
            UserGstDetail::where($matchthese)->delete();
            $lastInsertedId =  UserGstDetail::updateOrCreate($matchthese, $data)->id;
        if ($request->has('directors')) {
            $directors = $request->input('directors');
            UserDirector::where(['user_id' => $userId])->delete();
            foreach ($directors as $key => $ds) {
                $folderName = 'uploads/users/'.$useName.'/Gst/Company/Directors';
                $director = Helper :: uploadAddMultipleImages($request, $key,  $userId, $folderName, $dataon, 'GST Company Director');
                // $director =  $this->uploadPartnerImages($request, $key, $userId, 3, $folderName,$dataon,2);
                $director['user_gst_id'] =  $lastInsertedId;
                $director['user_id'] =  $userId;
                $director['director_email'] = $ds['email'];
                $director['director_mobile'] = $ds['mobile'];
                UserDirector::Create($director);
            }
        }
        return redirect('/gst/register')->with('success', 'Registered as Company successfully!');
    }

    public function businessStatus(Request $request){
        $userId = auth()->user()->id;
        $data['userGstDetails'] = UserGstDetail::whereIn('status',[1,2,3])->where('user_id',$userId)->get();
        return view('user.pages.gst.business_status')->with($data);
    }

    public function copyOfReturns(Request $request){
        $userId = auth()->user()->id;
        $useGstId = UserGstDetail::select('id')->whereIn('status',[3])->where('user_id',$userId)->get();
        foreach($useGstId as $gstId){
          $userGstId = $gstId->id;
          $data['copyofreturns']['trade_name'] =  $gstId->trade_name;
          $data['copyofreturns']['gst_number'] =  $gstId->gst_number;
          $data['copyofreturns'][$userGstId]=  CopyOfReturns::where('user_gst_id', $userGstId )->get()->toArray();
        }
        return view('user.pages.gst.copy_of_returns')->with($data);
    }

     public function queryRaised(Request $request){
         $userId = auth()->user()->id;
         $gstid = $request->gstid; 
         $useName = trim(auth()->user()->name).'-'.$userId; 
         $folderName = 'uploads/users/'.$useName.'/Gst/AdditionalImg';
         $img = Helper :: uploadImagesNormal($request, $userId, $folderName,'additional_img');
         $datas = UserGstDetail::find($gstid);
         $datas->last_update_by = 'user'; 
         $datas->last_update_by_id =  $userId;
         $datas->additional_img = $img['additional_img'];
         $datas->save();
         return redirect('/gst/business')->with('success', 'Uploaded the Document!');
     }
}