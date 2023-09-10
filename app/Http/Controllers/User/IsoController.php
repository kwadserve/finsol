<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserIsoDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
use Illuminate\Support\Facades\Config;
class IsoController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
      //  return view('user.pages.gst.details');
    }
    public function register_form() {
        if(isset($_REQUEST["payment_id"]) && !empty($_REQUEST["payment_request_id"])){
            UserIsoDetail::where('payment_unique_id', '=', $_REQUEST["payment_request_id"])->update(array('payment_status' => $_REQUEST["payment_status"]));
            $response = $_REQUEST;
            $response['userid'] = auth()->user()->id;
            $response['type']= 'ISO';
            Helper::storePaymentResponse($response);

            if($_REQUEST["payment_status"] == 'Credit'){
                $msg = 'Registered Iso and Payment received successfully!';
            }
            else{
                $msg = 'Registered Iso successfully! but we are unable to complete payment transaction. Please visit Dashboard to initiate the payment again.';
            }
            return redirect('/iso/register')->with('success', $msg);
        }
     
        $data['isoimages'] = Documents::where('for_multiple', 'ISO')->get();
        return view('user.pages.iso.isoform')->with($data);
    }
  
    public function storeIso(Request $request) {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Iso';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'ISO');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_iso'] = $request['iso_name'];
        $data['mobile_number'] = $request['mobile_number'];
        $matchthese = ['user_id' => $userId];
        // UserIsoDetail::where($matchthese)->delete();
        $lastInsertedId =  UserIsoDetail::Create($data)->id;

        if(isset($lastInsertedId) && !empty($lastInsertedId)){
            $data['insert_id'] = $lastInsertedId;
            $data['payment_purpose'] = 'Payment for Iso Register';
            $data['name_of_pan'] =  $data['name_of_iso'];
            $data['email_id'] = $data['email_id'];
            $data['mobile_number'] = $data['mobile_number'];
            $data['payment_amount'] = config::get('constants.instamojo.iso');
            $data['type'] = 'ISO';
            $data['route'] = 'iso.register_form';
            $payment_Req= Helper::createInstaMojoOrder($data);
        }
        
        return redirect('/iso/register')->with('success', 'Registered Iso successfully!');
    }
     
}