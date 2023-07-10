<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserPartnershipDetail;
use App\Models\UserPartnershipPartner;
use App\Models\Documents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\Helper as Helper;
 
class PartnershipController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    

    public function register_form() {
        $data['partnership_images'] = Documents::where(['for_multiple' => 'PARTNERSHIP'])->get();
        $data['partnership_partner_images'] = Documents::where(['for_multiple' => 'PARTNERSHIP Partner'])->get();
        return view('user.pages.partnership.partnershipform')->with($data);
    }

    public function storePartnership(Request $request) {
   
        $userId = auth()->user()->id;
        $dataon ='partnershippartner'; 
            $useName = trim(auth()->user()->name).'-'.$userId; 
            $folderName = 'uploads/users/'.$useName.'/Partnership';
            $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'PARTNERSHIP');
            $data['user_id'] = $userId;
            $data['name_of_partnership'] = $request->input('name_of_partnership'); 
            $data['partnership_email'] = $request->input('partnership_email'); 
            $data['partnership_mobile'] = $request->input('partnership_mobile'); 
            // $matchthese = ['user_id'=>$userId];
            // UserPartnershipDetail::where($matchthese)->delete();
            $lastInsertedId =  UserPartnershipDetail::Create($data)->id;
        if ($request->has('partnershippartner')) {
            $partnershippartner = $request->input('partnershippartner');
            UserPartnershipPartner::where(['user_id' => $userId])->delete();
            foreach ($partnershippartner as $key => $ps) {
                $folderName = 'uploads/users/'.$useName.'/Partnership/Partner';
                $partner =   Helper :: uploadAddMultipleImages($request, $key, $userId, $folderName,$dataon,'PARTNERSHIP Partner');
                $partner['user_partnership_id'] =  $lastInsertedId;
                $partner['user_id'] =  $userId;
                $partner['partner_email'] = $ps['partner_email'];
                $partner['partner_mobile'] = $ps['partner_mobile'];
                UserPartnershipPartner::Create($partner);
            }
        }
        return redirect('/partnership/register')->with('success', 'Registered Partnership Form successfully!');
    }
    
}