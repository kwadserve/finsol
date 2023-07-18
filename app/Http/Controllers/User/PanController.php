<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserPanDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
use App\Models\Razorpay;
use Illuminate\Support\Facades\Config;

class PanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function register_form(Request $request)
    {
        $param = array(
            'key' => config::get('constants.razorpay.RAZOR_KEY'),
            'secret' => config::get('constants.razorpay.RAZOR_SECRET'),
            'amount' => 100,
            'currency' => config::get('constants.razorpay.CURRENCY')
        );

        if(empty($request->session()->get('razorpay_order_id'))){
            $data['order_data'] = Helper::createRazorpayOrder($param);
            Razorpay::storeOrderData($data['order_data'],'PAN');
        }
        else{
            $data['order_data'] = array(
                'razorpay_order_id' => $request->session()->get('razorpay_order_id'),
                'amount' => $param['amount'],
                'id' => $request->session()->get('razorpay_order_id')
            );
        } 
        
        $data['panimages'] = Documents::where('for_multiple', 'PAN')->get();
        return view('user.pages.pan.panform')->with($data);
    }

    public function storePan(Request $request)
    {
        $userId = auth()->user()->id;
        if(isset($request->razorpay_payment_id) && !empty($request->razorpay_payment_id)){

            UserPanDetail::where("razorpay_order_id", $request->razorpay_order_id)
                ->where('user_id',$userId)
                ->update([
                    "razorpay_signature" => $request->razorpay_signature,
                    "razorpay_payment_id" => $request->razorpay_payment_id,
                    "payment_status" => 'Success',
                    "chr_display" => 'Y'
                ]);
            $data['success'] = 'Registered Pan successfully!';
            return redirect('/pan/register')->with($data);
        }
            
            $useName = trim(auth()->user()->name) . '-' . $userId;
            $folderName = 'uploads/users/' . $useName . '/Pan';
            $data = Helper::uploadImagesNew($request, $userId, $folderName, 'PAN');
            $data['user_id'] = $userId;
            $data['email_id'] = $request['email_id'];
            $data['name_of_pan'] = $request['pan_name'];
            $data['mobile_number'] = $request['mobile_number'];
            $data['razorpay_order_id'] = $request['razorpay_order_id'];
            UserPanDetail::Create($data);

            $data['success'] = 'Please submit the payment for registration';
            $data['user_data'] = $data;
            $data['razorpy'] = 'Y';

            return redirect('/pan/register')->with($data);

    }


}