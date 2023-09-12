<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserTanDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
use Illuminate\Support\Facades\Config;
 
class TanController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
      //  return view('user.pages.gst.details');
    }
    public function register_form() {
     
        if(isset($_REQUEST["payment_id"]) && !empty($_REQUEST["payment_request_id"])){
            UserTanDetail::where('payment_unique_id', '=', $_REQUEST["payment_request_id"])->update(array('payment_status' => $_REQUEST["payment_status"]));
            $response = $_REQUEST;
            $response['userid'] = auth()->user()->id;
            $response['type']= 'TAN';
            Helper::storePaymentResponse($response);

            if($_REQUEST["payment_status"] == 'Credit'){
                $msg = 'Registered Tan and Payment received successfully!';
            }
            else{
                $msg = 'Registered Tan successfully! but we are unable to complete payment transaction. Please contact to Administrator.';
            }
            return redirect('/tan/register')->with('success', $msg);
        }

        $data['tanimages'] = Documents::where('for_multiple', 'TAN')->get();
        return view('user.pages.tan.tanform')->with($data);
    }
  
    public function storeTan(Request $request) {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Tan';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'TAN');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_tan'] = $request['tan_name'];
        $data['mobile_number'] = $request['mobile_number'];
        $matchthese = ['user_id' => $userId];
        // UserTanDetail::where($matchthese)->delete();
        $insert_data= UserTanDetail::Create($data);

        if(isset($insert_data->id) && !empty($insert_data->id)){
            $data['insert_id'] = $insert_data->id;
            $data['payment_purpose'] = 'Payment for Tan Register';
            $data['name_of_pan'] = $data['name_of_tan'];
            $data['payment_amount'] = config::get('constants.instamojo.tan');
            $data['type'] = 'TAN';
            $data['route'] = 'tan.register';
            $payment_Req= Helper::createInstaMojoOrder($data);
        }

        return redirect('/tan/register')->with('success', 'Registered Tan successfully!');
    }
     
}