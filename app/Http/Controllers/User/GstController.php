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

class GstController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        return view('user.pages.gst.details');
    }
    public function register_form() {
        $data['images'] = Documents::where('gst_type_val', '1')->get();
        $data['firm_images'] = Documents::where(['gst_type_val' => '2', 'for_multiple' => null])->get();
        $data['firm_partner_images'] = Documents::where(['gst_type_val' => '2', 'for_multiple' => 'Partner'])->get();
        $data['company_images'] = Documents::where(['gst_type_val' => '3', 'for_multiple' => null])->get();
        $data['company_director_images'] = Documents::where(['gst_type_val' => '3', 'for_multiple' => 'Director'])->get();
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
        $folderName = 'uploads/users/Gst/'.$useName.'/Individual';
        $data = $this->uploadAllImages($request, $userId, 1, $folderName);
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['gst_type'] = $request['gst_type'];
        $data['trade_name'] = $request['trade_name'];
        $matchthese = ['user_id' => $userId, 'gst_type' => 'Individual'];
        UserGstDetail::where($matchthese)->delete();
        UserGstDetail::updateOrCreate($matchthese, $data);
        return redirect('/gst/register')->with('success', 'Registered as Individual successfully!');;
    }
    public function storeFirm(Request $request) {
   
        $userId = auth()->user()->id;
        $dataon ='partners'; 
            $useName = trim(auth()->user()->name).'-'.$userId; 
            $folderName = 'uploads/users/Gst/'.$useName.'/Firm';
            $data =  $this->uploadAllImages($request,$userId,2,$folderName);
            $data['user_id'] = $userId;
            $data['email_id'] = $request['email_id'];
            $data['gst_type'] = $request['gst_type'];
            $data['trade_name'] = $request['trade_name'];
            $matchthese = ['user_id'=>$userId, 'gst_type'=>'Firm'];
            UserGstDetail::where($matchthese)->delete();
            $lastInsertedId =  UserGstDetail::updateOrCreate($matchthese, $data)->id;
        if ($request->has('partners')) {
            $partners = $request->input('partners');
            UserPartner::where(['user_id' => $userId])->delete();
            foreach ($partners as $key => $ps) {
                $folderName = 'uploads/users/Gst/'.$useName.'/Firm/Partners';
                $partner =  $this->uploadPartnerImages($request, $key, $userId, 2, $folderName,$dataon,1);
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
            $folderName = 'uploads/users/Gst/'.$useName.'/Company';
            $data =  $this->uploadAllImages($request,$userId,2,$folderName);
            $data['user_id'] = $userId;
            $data['email_id'] = $request['email_id'];
            $data['gst_type'] = $request['gst_type'];
            $data['trade_name'] = $request['trade_name'];
            $matchthese = ['user_id'=>$userId, 'gst_type'=>'Company'];
            UserGstDetail::where($matchthese)->delete();
            $lastInsertedId =  UserGstDetail::updateOrCreate($matchthese, $data)->id;
        if ($request->has('directors')) {
            $directors = $request->input('directors');
            UserDirector::where(['user_id' => $userId])->delete();
            foreach ($directors as $key => $ds) {
                $folderName = 'uploads/users/Gst/'.$useName.'/Company/Directors';
                $director =  $this->uploadPartnerImages($request, $key, $userId, 3, $folderName,$dataon,2);
                $director['user_gst_id'] =  $lastInsertedId;
                $director['user_id'] =  $userId;
                $director['director_email'] = $ds['email'];
                $director['director_mobile'] = $ds['mobile'];
                UserDirector::Create($director);
            }
        }
        return redirect('/gst/register')->with('success', 'Registered as Company successfully!');
    }
}