<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserPanDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class EpfController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        $data['epf_company_images'] = Documents::where(['gst_type_val' => '6', 'for_multiple' => null])->get();
        $data['epf_company_signatory_images'] = Documents::where(['gst_type_val' => '6', 'for_multiple' => 'EPF Signatory'])->get();
        return view('user.pages.epf.epfform')->with($data);
    }

    public function storeEPF(Request $request) {
   
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
    // public function register_form() {
     
    //     $data['panimages'] = Documents::where('gst_type_val', '4')->get();
    //     return view('user.pages.pan.panform')->with($data);
    // }
  
    // public function storePan(Request $request) {
    //     $userId = auth()->user()->id;
    //     $useName = trim(auth()->user()->name).'-'.$userId; 
    //     $folderName = 'uploads/users/'.$useName.'/Pan';
    //     $data = Helper :: uploadImages($request, $userId, 4, $folderName);
    //     $data['user_id'] = $userId;
    //     $data['email_id'] = $request['email_id'];
    //     $data['mobile_number'] = $request['mobile_number'];
    //     $matchthese = ['user_id' => $userId];
    //     UserPanDetail::where($matchthese)->delete();
    //     UserPanDetail::updateOrCreate($matchthese, $data);
    //     return redirect('/pan/register')->with('success', 'Registered Pan successfully!');;
    // }
     
}