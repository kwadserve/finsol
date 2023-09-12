<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserPanDetail;
use App\Models\UserGstDetail;
use App\Models\UserTanDetail;
use App\Models\UserEpfDetail;
use App\Models\UserEsicDetail;
use App\Models\UserHufDetail;
use App\Models\UserTrustDetail;
use App\Models\UserTrademarkDetail;
use App\Models\UserCompanyDetail;
use App\Models\UserUdamyDetail;
use App\Models\UserPartnershipDetail;
use App\Models\UserGstUploadDocument;
use App\Models\UserImportExportDetail;
use App\Models\UserFactoryLicenseDetail;
use App\Models\UserLabourDetail;
use App\Models\UserShopDetail;
use App\Models\UserIsoDetail;
use App\Models\Documents;
use App\Models\UserFssaiDetail;
use App\Models\UserItrDetail;
use App\Models\UserTdsDetail;
use App\Models\UserTaxauditDetail;
use App\Helpers\Helper as Helper;
use Illuminate\Support\Facades\File;
use App\Models\UserISIDetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;


class DashboardController extends Controller
{
    public $payment_type;
    public function __construct()
    {
        $this->payment_type = '';
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if (isset($request->payment_id) && !empty($request->payment_request_id)) {
            $this->storePaymentData($request);
        }
        $userId = auth()->user()->id;

        $data['userGstDetails'] = UserGstDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['gst_instamojo_amount'] = config::get('constants.instamojo.gst');

        $data['userPanDetails'] = UserPanDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['pan_instamojo_amount'] = config::get('constants.instamojo.pan');

        $data['userTanDetails'] = UserTanDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['tan_instamojo_amount'] = config::get('constants.instamojo.tan');

        $data['userEpfDetails'] = UserEpfDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['epf_instamojo_amount'] = config::get('constants.instamojo.epf');
        
        $data['userEsicDetails'] = UserEsicDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['esic_instamojo_amount'] = config::get('constants.instamojo.esic');

        $data['userTrademarkDetails'] = UserTrademarkDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['trademark_instamojo_amount'] = config::get('constants.instamojo.trademark');

        $data['userCompanyDetails'] = UserCompanyDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['company_instamojo_amount'] = config::get('constants.instamojo.company');

        $data['userPartnershipDetails'] = UserPartnershipDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['partnership_instamojo_amount'] = config::get('constants.instamojo.partnership');

        $data['userHufDetails'] = UserHufDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['huf_instamojo_amount'] = config::get('constants.instamojo.huf');

        $data['userTrustDetails'] = UserTrustDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['trust_instamojo_amount'] = config::get('constants.instamojo.trust');

        $data['userUdamyDetails'] = UserUdamyDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['udamy_instamojo_amount'] = config::get('constants.instamojo.udamy');

        $data['userImportExportDetails'] = UserImportExportDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['import_instamojo_amount'] = config::get('constants.instamojo.Import');

        $data['userLabourDetails'] = UserLabourDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['labour_instamojo_amount'] = config::get('constants.instamojo.labour');

        $data['userShopDetails'] = UserShopDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['shop_instamojo_amount'] = config::get('constants.instamojo.shop');

        $data['userIsoDetails'] = UserIsoDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['iso_instamojo_amount'] = config::get('constants.instamojo.iso');

        $data['userFssaiDetails'] = UserFssaiDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        $data['fssai_instamojo_amount'] = config::get('constants.instamojo.fssai');

        $data['userItrDetails'] = UserItrDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        
        $data['userTaxauditDetails'] = UserTaxauditDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();

        $data['userTdsDetails'] = UserTdsDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();

        $data['userFactoryLicenseDetails'] = UserFactoryLicenseDetail::whereIn('status', [1, 2, 3, 4])->where('user_id', $userId)->orderBy('id', 'DESC')->get();

        $data['userISIDetail'] = UserISIDetail::whereIn('status',[1,2,3,4])->where('user_id',$userId)->orderBy('id', 'DESC')->get();
        $data['factory_instamojo_amount'] = config::get('constants.instamojo.factory');
        // $data['userUploadeDocuments'] = UserGstUploadDocument::where('user_id',$userId)->orderBy('id', 'DESC')->paginate(5);
        return view('user.pages.dashboard.dashboard')->with($data);
    }

    public function queryRaised(Request $request)
    {
        $userId = auth()->user()->id;
        $formType = $request->form_type;
        $id = $request->id;
        if ($id) {
            $useName = trim(auth()->user()->name) . '-' . $userId;
            $folderName = 'uploads/users/' . $useName . '/' . $formType . '/AdditionalImg';
            $name = 'additional_img';
            $img = Helper::uploadImagesNormal($request, $userId, $folderName, $name);
            if ($formType == 'Pan') {
                $datas = UserPanDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }
            if ($formType == 'Tan') {
                $datas = UserTanDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }
            if ($formType == 'Epf') {
                $datas = UserEpfDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }

            if ($formType == 'Esic') {
                $datas = UserEsicDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }

            if ($formType == 'Trademark') {
                $datas = UserTrademarkDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }


            if ($formType == 'Company') {
                $datas = UserCompanyDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }


            if ($formType == 'Partnership') {
                $datas = UserPartnershipDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }

            if ($formType == 'Huf') {
                $datas = UserHufDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }

            if ($formType == 'Trust') {
                $datas = UserTrustDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }


            if ($formType == 'Udamy') {
                $datas = UserUdamyDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }

            if ($formType == 'ImportExport') {
                $datas = UserImportExportDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }

            if ($formType == 'Labour') {
                $datas = UserLabourDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }
            if ($formType == 'Shop') {
                $datas = UserShopDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }

            if ($formType == 'Iso') {
                $datas = UserIsoDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }

            if ($formType == 'Fssai') {
                $datas = UserFssaiDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }

            if ($formType == 'Itr') {
                $datas = UserItrDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }

            if ($formType == 'Taxaudit') {
                $datas = UserTaxauditDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }

            if ($formType == 'Tds') {
                $datas = UserTdsDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }

            if ($formType == 'FactoryLicense') {
                $datas = UserFactoryLicenseDetail::find($id);
                $datas->user_note = $request->user_note;
                $datas->status = 3; // Query Updated      
                $datas->last_update_by = 'user';
                $datas->last_update_by_id = $userId;
                $datas->additional_img = $img['additional_img'];
                $datas->save();
            }

            return redirect('/dashboard')->with('success', 'Uploaded the Document!');
        }
    }

    public function approvedFile(Request $request)
    {

        $files = $request->input('files');
        $commaValues = explode(",", $files);
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name) . '-' . $userId;
        $formType = $request->form_type;
        $zipName = $formType . 'ApprovedFile-' . $useName . '.zip';
        $zip = new \ZipArchive();
        $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        if (count($commaValues) > 1) {
            foreach ($commaValues as $file) {
                $filePath = 'uploads/users/' . $useName . '/' . $formType . '/' . 'ApprovedImg/' . $file;
                if (File::exists($filePath)) {
                    $fileContents = file_get_contents(public_path($filePath));
                    $zip->addFromString(basename($file), $fileContents);
                } else {
                    return redirect('/dashboard')->with('approvedfilenotexist', 'File Not Exist!');
                }
            }
        } else {
            $filePath = 'uploads/users/' . $useName . '/' . $formType . '/' . 'ApprovedImg/' . $files;
            if (File::exists($filePath)) {
                $fileContents = file_get_contents(public_path($filePath));
                $zip->addFromString(basename($files), $fileContents);
            } else {
                return redirect('/dashboard')->with('approvedfilenotexist', 'File Not Exist!');
            }
        }
        $zip->close();
        return response()->download($zipName)->deleteFileAfterSend(true);
    }

    public function raisedFile(Request $request)
    {
        $files = $request->input('files');
        $commaValues = explode(",", $files);
        $userId = auth()->user()->id;
        $formType = $request->form_type;
        $useName = trim(auth()->user()->name) . '-' . $userId;
        $zipName = $formType . 'QueryRaisedFile-' . $useName . '.zip';
        $zip = new \ZipArchive();
        $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        if (count($commaValues) > 1) {
            foreach ($commaValues as $file) {
                $filePath = 'uploads/users/' . $useName . '/' . $formType . '/' . 'RaisedImg/' . $file;
                if (File::exists($filePath)) {
                    $fileContents = file_get_contents(public_path($filePath));
                    $zip->addFromString(basename($file), $fileContents);
                } else {
                    return redirect('/dashboard')->with('raisedfilenotexist', 'File Not Exist!');
                }
            }
        } else {
            $filePath = 'uploads/users/' . $useName . '/' . $formType . '/' . 'RaisedImg/' . $files;
            if (File::exists($filePath)) {
                $fileContents = file_get_contents(public_path($filePath));
                $zip->addFromString(basename($files), $fileContents);
            } else {
                return redirect('/dashboard')->with('raisedfilenotexist', 'File Not Exist!');
            }
        }
        $zip->close();
        return response()->download($zipName)->deleteFileAfterSend(true);
    }

    public function createInstaMojoOrder(Request $request)
    {
        // Session::put('form_type', $request->form_type);
        $request->session()->put('form_type', $request->form_type);

        $this->payment_type = $request->form_type;
        $userId = auth()->user()->id;
        $data['insert_id'] = $request->insert_id;
        $data['payment_purpose'] = 'Payment for ' . $request->payment_purpose . ' Register';
        $data['payment_amount'] = $request->payment_amount;
        $data['type'] = $request->form_type;
        $data['route'] = $request->route;
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_pan'] = $request['name_of_pan'];
        $data['mobile_number'] = $request['mobile_number'];

        $payment_Req = Helper::createInstaMojoOrder($data);

    }

    public function storePaymentData($data)
    {
        $form_type = session()->get('form_type');
      
        if ($form_type == 'PAN') {
            UserPanDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        } else if ($form_type == 'TAN') {
            UserTanDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        } else if ($form_type == 'Company') {
            UserCompanyDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        }
        else if ($form_type == 'Partnership') {
            UserPartnershipDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        }
        else if ($form_type == 'Epf') {
            UserEpfDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        }

        else if($form_type == 'Huf'){
            UserHufDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        }
        else if($form_type == 'Trust'){
            UserTrustDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        }

        else if($form_type == 'Udamy'){
            UserUdamyDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        }
        else if($form_type == 'Import'){
            UserImportExportDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        }

        else if($form_type == 'Shop'){
            UserShopDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        }
        else if($form_type == 'ISO'){
            UserIsoDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        }
        else if($form_type == 'Fssai'){
            UserFssaiDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        }
        else if($form_type == 'Factory'){
            UserFactoryLicenseDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        }
        else if($form_type == 'Gst'){
            UserGstDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        }
        else if($form_type == 'Esic'){
            UserEsicDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        }
        else if($form_type == 'Trademark'){
            UserTrademarkDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        }
        else if($form_type == 'Labour'){
            UserLabourDetail::where('payment_unique_id', '=', $data->payment_request_id)->update(array('payment_status' => $data->payment_status));
        }

        $response = $data->toArray();
        $response['userid'] = auth()->user()->id;
        $response['type'] = $form_type;

        Helper::storePaymentResponse($response);

        if ($data->payment_status == 'Credit') {
            $msg = 'Payment received successfully!';
        } else {
            $msg = 'We are unable to complete payment transaction. Please contact to Administrator.';
        }
        return redirect('/dashboard')->with('payment_success', $msg);
    }

}