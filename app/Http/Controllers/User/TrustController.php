<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserTrustDetail;
use App\Models\UserTrustMember;
use App\Models\Documents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\Helper as Helper;
use Illuminate\Support\Facades\Config;
 
class TrustController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    

    public function register_form() {
        if(isset($_REQUEST["payment_id"]) && !empty($_REQUEST["payment_request_id"])){
            UserTrustDetail::where('payment_unique_id', '=', $_REQUEST["payment_request_id"])->update(array('payment_status' => $_REQUEST["payment_status"]));
            $response = $_REQUEST;
            $response['userid'] = auth()->user()->id;
            $response['type']= 'Trust';
            Helper::storePaymentResponse($response);

            if($_REQUEST["payment_status"] == 'Credit'){
                $msg = 'Registered Trust/NGO and Payment received successfully!';
            }
            else{
                $msg = 'Registered Trust/NGO successfully! but we are unable to complete payment transaction. Please visit Dashboard to initiate the payment again.';
            }
            return redirect('/trust/register')->with('success', $msg);
        }
        $data['trust_images'] = Documents::where(['for_multiple' => 'TRUST'])->get();
        $data['trust_member_images'] = Documents::where(['for_multiple' => 'TRUST Member'])->get();
        return view('user.pages.trust.trustform')->with($data);
    }

    public function storeTrust(Request $request) {
   
        $userId = auth()->user()->id;
        $dataon ='trustmember'; 
            $useName = trim(auth()->user()->name).'-'.$userId; 
            $folderName = 'uploads/users/'.$useName.'/Trust';
            $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'TRUST');
            $data['user_id'] = $userId;
            $data['name_of_trust'] = $request->input('name_of_trust');
            $data['nature_of_trust'] = $request->input('nature_of_trust');
            $data['trust_email'] = $request->input('trust_email');
            $data['trust_mobile'] = $request->input('trust_mobile');
            $lastInsertedId =  UserTrustDetail::Create($data)->id;

            if(isset($lastInsertedId) && !empty($lastInsertedId)){
                $data['insert_id'] = $lastInsertedId;
                $data['payment_purpose'] = 'Payment for Trust/NGO Register';
                $data['name_of_pan'] =  $data['name_of_trust'];
                $data['email_id'] = $data['trust_email'];
                $data['mobile_number'] = $data['trust_mobile'];
                $data['payment_amount'] = config::get('constants.instamojo.trust');
                $data['type'] = 'Trust';
                $data['route'] = 'trust.paymentregister';
                $payment_Req= Helper::createInstaMojoOrder($data);
            }

        if ($request->has('trustmember')) {
            $trustmember = $request->input('trustmember');
            UserTrustMember::where(['user_id' => $userId])->delete();
            foreach ($trustmember as $key => $ps) {
                $folderName = 'uploads/users/'.$useName.'/Trust/Member';
                $member =   Helper :: uploadAddMultipleImages($request, $key, $userId, $folderName,$dataon,'TRUST Member');
                $member['user_trust_id'] =  $lastInsertedId;
                $member['user_id'] =  $userId;
                $member['name_of_member'] = $ps['name_of_member'];
                UserTrustMember::Create($member);
            }
        }
        return redirect('/trust/register')->with('success', 'Registered Trust successfully!');
    }
    
}