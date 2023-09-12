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
use Illuminate\Support\Facades\Config;
 
class PartnershipController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    

    public function register_form() {

        if(isset($_REQUEST["payment_id"]) && !empty($_REQUEST["payment_request_id"])){
            UserPartnershipDetail::where('payment_unique_id', '=', $_REQUEST["payment_request_id"])->update(array('payment_status' => $_REQUEST["payment_status"]));
            $response = $_REQUEST;
            $response['userid'] = auth()->user()->id;
            $response['type']= 'Partnership';
            Helper::storePaymentResponse($response);

            if($_REQUEST["payment_status"] == 'Credit'){
                $msg = 'Registered Partnership and Payment received successfully!';
            }
            else{
                $msg = 'Registered Partnership successfully! but we are unable to complete payment transaction. Please visit Dashboard to initiate the payment again.';
            }
            return redirect('/partnership/register')->with('success', $msg);
        }

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

            if(isset($lastInsertedId) && !empty($lastInsertedId)){
                $data['insert_id'] = $lastInsertedId;
                $data['payment_purpose'] = 'Payment for Partnership Registration';
                $data['name_of_pan'] =  $data['name_of_partnership'];
                $data['email_id'] = $data['partnership_email'];
                $data['mobile_number'] = $data['partnership_mobile'];
                $data['payment_amount'] = config::get('constants.instamojo.partnership');
                $data['type'] = 'Partnership';
                $data['route'] = 'partnership.paymentregister';
                $payment_Req= Helper::createInstaMojoOrder($data);
            }

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