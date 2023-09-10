<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserShopDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
use Illuminate\Support\Facades\Config;
 
class ShopController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
      //  return view('user.pages.gst.details');
    }
    public function register_form() {

        if(isset($_REQUEST["payment_id"]) && !empty($_REQUEST["payment_request_id"])){
            UserShopDetail::where('payment_unique_id', '=', $_REQUEST["payment_request_id"])->update(array('payment_status' => $_REQUEST["payment_status"]));
            $response = $_REQUEST;
            $response['userid'] = auth()->user()->id;
            $response['type']= 'Shop';
            Helper::storePaymentResponse($response);

            if($_REQUEST["payment_status"] == 'Credit'){
                $msg = 'Registered Shop and Payment received successfully!';
            }
            else{
                $msg = 'Registered Shop successfully! but we are unable to complete payment transaction. Please visit Dashboard to initiate the payment again.';
            }
            return redirect('/shop/register')->with('success', $msg);
        }
     
        $data['shopimages'] = Documents::where('for_multiple', 'SHOP')->get();
        return view('user.pages.shop.shopform')->with($data);
    }
  
    public function storeShop(Request $request) {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Shop';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'SHOP');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_shop'] = $request['shop_name'];
        $data['mobile_number'] = $request['mobile_number'];
        $matchthese = ['user_id' => $userId];
        // UserShopDetail::where($matchthese)->delete();
        $lastInsertedId = UserShopDetail::Create($data)->id;

        if(isset($lastInsertedId) && !empty($lastInsertedId)){
            $data['insert_id'] = $lastInsertedId;
            $data['payment_purpose'] = 'Payment for Shop Register';
            $data['name_of_pan'] =  $data['name_of_shop'];
            $data['email_id'] = $data['email_id'];
            $data['mobile_number'] = $data['mobile_number'];
            $data['payment_amount'] = config::get('constants.instamojo.shop');
            $data['type'] = 'Shop';
            $data['route'] = 'shop.register_form';
            $payment_Req= Helper::createInstaMojoOrder($data);
        }
        return redirect('/shop/register')->with('success', 'Registered Shop successfully!');
    }
     
}