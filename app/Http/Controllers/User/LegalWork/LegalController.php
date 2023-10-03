<?php

namespace App\Http\Controllers\User\LegalWork;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Helper as Helper;
use App\Models\Documents;
use App\Models\LegalWork;

class LegalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function register_form()
    {
        if (isset($_REQUEST["payment_id"]) && !empty($_REQUEST["payment_request_id"])) {
            LegalWork::where('payment_unique_id', '=', $_REQUEST["payment_request_id"])->update(array('payment_status' => $_REQUEST["payment_status"]));
            $response = $_REQUEST;
            $response['userid'] = auth()->user()->id;
            $response['type'] = 'Legal';
            Helper::storePaymentResponse($response);

            if ($_REQUEST["payment_status"] == 'Credit') {
                $msg = 'Registered LegalWork and Payment received successfully!';
            } else {
                $msg = 'Registered LegalWork successfully! But we are unable to complete payment transaction. Please contact to Administrator.';
            }
            return redirect('/legal-work/register')->with('success', $msg);
        }

        $data['legalworkimages'] = Documents::where('for_multiple', 'LEGALWORK')->get();
        return view('user.pages.legalwork.form')->with($data);
    }

    public function storeLegalWork(Request $request)
    {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name) . '-' . $userId;
        $folderName = 'uploads/users/' . $useName . '/LegalWork';
        $data = Helper::uploadImagesNew($request, $userId, $folderName, 'LEGALWORK');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name'] = $request['name'];
        $data['mobile_number'] = $request['mobile_number'];
        $insert_data = LegalWork::Create($data);

        if (isset($insert_data->id) && !empty($insert_data->id)) {
            $data['insert_id'] = $insert_data->id;
            $data['payment_purpose'] = 'Payment for LegalWork Register';
            $data['payment_amount'] = 10;
            $data['name_of_pan'] = $data['name'];
            $data['type'] = 'Legal';
            $data['route'] = 'legalwork.register';
            $payment_Req = Helper::createInstaMojoOrder($data);
        }

        return redirect('/legal-work/register')->with('success', 'Registered LegalWork successfully!');
    }
}
