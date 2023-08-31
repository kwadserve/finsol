<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserCompanyDetail;
use App\Models\UserCompanySignatory;
use App\Models\Documents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\Helper as Helper;
 
class CompanyController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        echo "Detail page";
    }

    public function register_form() {

        if(isset($_REQUEST["payment_id"]) && !empty($_REQUEST["payment_request_id"])){
            UserCompanyDetail::where('payment_unique_id', '=', $_REQUEST["payment_request_id"])->update(array('payment_status' => $_REQUEST["payment_status"]));
            $response = $_REQUEST;
            $response['userid'] = auth()->user()->id;
            $response['type']= 'Company';
            Helper::storePaymentResponse($response);

            if($_REQUEST["payment_status"] == 'Credit'){
                $msg = 'Registered Company and Payment received successfully!';
            }
            else{
                $msg = 'Registered Company successfully! but we are unable to complete payment transaction. Please visit Dashboard to initiate the payment again.';
            }
            return redirect('/company/register')->with('success', $msg);
        }

        $data['trademark_company_images'] = Documents::where(['for_multiple' => 'TRADEMARK Company'])->get();
        $data['trademark_company_signatory_images'] = Documents::where(['for_multiple' => 'TRADEMARK Signatory'])->get();
        $data['trademark_other_images'] = Documents::where(['for_multiple' => 'TRADEMARK Others'])->get();
        $data['company_images'] = Documents::where(['for_multiple' => 'COMPANY'])->get();
        $data['company_signatory_images'] = Documents::where(['for_multiple' => 'COMPANY Signatory'])->get();
        return view('user.pages.company.companyform')->with($data);
    }

    public function storeCompany(Request $request) {
   
        $userId = auth()->user()->id;
        $dataon ='companysignatory'; 
            $useName = trim(auth()->user()->name).'-'.$userId; 
            $folderName = 'uploads/users/'.$useName.'/Company';
            $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'COMPANY');
            $data['user_id'] = $userId;
            $data['name_of_company'] = $request->input('name_of_company'); 
            $data['company_email'] = $request->input('company_email'); 
            $data['company_mobile'] = $request->input('company_mobile'); 
            // $matchthese = ['user_id'=>$userId];
            // UserCompanyDetail::where($matchthese)->delete();
            $lastInsertedId =  UserCompanyDetail::Create($data)->id;

            if(isset($lastInsertedId) && !empty($lastInsertedId)){
                $data['insert_id'] = $lastInsertedId;
                $data['payment_purpose'] = 'Payment for Company Register';
                $data['name_of_pan'] =  $data['name_of_company'];
                $data['email_id'] = $data['company_email'];
                $data['mobile_number'] = $data['company_mobile'];
                $data['payment_amount'] = 10;
                $data['type'] = 'Company';
                $data['route'] = 'company.pamentregister';
                $payment_Req= Helper::createInstaMojoOrder($data);
            }
            
        if ($request->has('companysignatory')) {
            
            $companysignatory = $request->input('companysignatory');
            UserCompanySignatory::where(['user_id' => $userId])->delete();
            foreach ($companysignatory as $key => $ps) {
                $folderName = 'uploads/users/'.$useName.'/Company/Signatory';
                $partner =   Helper :: uploadSignatoryImages($request, $key, $userId, $folderName,$dataon,'COMPANY Signatory');
                $partner['user_comp_id'] =  $lastInsertedId;
                $partner['user_id'] =  $userId;
                $partner['comp_sign_email'] = $ps['email'];
                $partner['comp_sign_mobile'] = $ps['mobile'];
                UserCompanySignatory::Create($partner);
            }
        }
        return redirect('/company/register')->with('success', 'Registered Company successfully!');
    }
    
}