<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserEpfDetail;
use App\Models\UserEpfSignatory;
use App\Models\UserLabourDetail;
use App\Models\UserLabourSignatory; 
use App\Models\Documents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\Helper as Helper;
use Illuminate\Support\Facades\Config;
 
class LabourController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        echo "Detail page";
        // $data['epf_company_images'] = Documents::where(['gst_type_val' => '6', 'for_multiple' => null])->get();
        // $data['epf_company_signatory_images'] = Documents::where(['gst_type_val' => '6', 'for_multiple' => 'EPF Signatory'])->get();
        // return view('user.pages.epf.epfform')->with($data);
    }

    public function register_form() {

        if(isset($_REQUEST["payment_id"]) && !empty($_REQUEST["payment_request_id"])){
            UserLabourDetail::where('payment_unique_id', '=', $_REQUEST["payment_request_id"])->update(array('payment_status' => $_REQUEST["payment_status"]));
            $response = $_REQUEST;
            $response['userid'] = auth()->user()->id;
            $response['type']= 'Labour';
            Helper::storePaymentResponse($response);

            if($_REQUEST["payment_status"] == 'Credit'){
                $msg = 'Registered Labour and Payment received successfully!';
            }
            else{
                $msg = 'Registered Labour successfully! but we are unable to complete payment transaction. Please visit Dashboard to initiate the payment again.';
            }
            return redirect('/labour/register')->with('success', $msg);
        }
        $data['petty_images'] = Documents::where(['for_multiple' => 'Petty Contract'])->get();
        $data['petty_signatory_images'] = Documents::where(['for_multiple' => 'Petty Contract Signatory'])->get();
        $data['labour_images'] = Documents::where(['for_multiple' => 'Labour Contract'])->get();
        return view('user.pages.labour.labourform')->with($data);
    }

    public function storePetty(Request $request) {
   
        $userId = auth()->user()->id;
        $dataon ='laboursignatory'; 
            $useName = trim(auth()->user()->name).'-'.$userId; 
            $folderName = 'uploads/users/'.$useName.'/Labour/Petty';
            $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'PETTY');
            $data['user_id'] = $userId;
            $data['labour_type'] = $request['labour_type'];
            // $matchthese = ['user_id'=>$userId, 'labour_type'=>'Company'];
            // UserLabourDetail::where($matchthese)->delete();
            $data['name_of_labour'] = $request['name_of_labour'];
            $data['labour_email'] = $request['email_id'];
            $data['labour_mobile'] = $request['mobile_number'];
            $data['name_of_business'] = $request['name_of_business'];
            
            $lastInsertedId =  UserLabourDetail::updateOrCreate($data)->id;

            if(isset($lastInsertedId) && !empty($lastInsertedId)){
                $data['insert_id'] = $lastInsertedId;
                $data['payment_purpose'] = 'Payment for Labour Register';
                $data['name_of_pan'] =  $data['name_of_labour'];
                $data['email_id'] = $data['labour_email'];
                $data['mobile_number'] = $data['labour_mobile'];
                $data['payment_amount'] = 10;
                $data['type'] = 'Labour';
                $data['route'] = 'labour.register_form';
                $payment_Req= Helper::createInstaMojoOrder($data);
            }
        if ($request->has('laboursignatory')) {
            $laboursignatory = $request->input('laboursignatory');
            UserLabourSignatory::where(['user_id' => $userId])->delete();
            foreach ($laboursignatory as $key => $ps) {
                $folderName = 'uploads/users/'.$useName.'/Labour/Petty/Signatory';
                $partner =   Helper :: uploadSignatoryImages($request, $key, $userId, $folderName,$dataon,'PETTY Signatory');
                $partner['user_labour_id'] =  $lastInsertedId;
                $partner['user_id'] =  $userId;
                $partner['labour_sign_email'] = $ps['email'];
                $partner['labour_sign_mobile'] = $ps['mobile'];
                UserLabourSignatory::Create($partner);
            }
        }
        return redirect('/labour/register')->with('success', 'Registered Petty Contractor successfully!');
    }


    public function storeLabour(Request $request){
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Labour/Labour';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'LABOUR');
        $data['user_id'] = $userId;
        $data['labour_email'] = $request['email_id'];
        $data['labour_mobile'] = $request['mobile_number'];
        $data['labour_type'] = $request['labour_type'];
        $data['name_of_labour'] = $request['name_of_labour'];
        $data['name_of_business'] = $request['name_of_business'];
        // $matchthese = ['user_id' => $userId, 'labour_type' => 'Others'];
        // UserLabourDetail::where($matchthese)->delete();
        $lastInsertedId = UserLabourDetail::Create($data)->id;

        if(isset($lastInsertedId) && !empty($lastInsertedId)){
            $data['insert_id'] = $lastInsertedId;
            $data['payment_purpose'] = 'Payment for Labour Register';
            $data['name_of_pan'] =  $data['name_of_labour'];
            $data['email_id'] = $data['labour_email'];
            $data['mobile_number'] = $data['labour_mobile'];
            $data['payment_amount'] = config::get('constants.instamojo.labour');
            $data['type'] = 'Labour';
            $data['route'] = 'labour.register_form';
            $payment_Req= Helper::createInstaMojoOrder($data);
        }
        return redirect('/labour/register')->with('success', 'Registered Labour Contractor successfully!');;
    }


    
}