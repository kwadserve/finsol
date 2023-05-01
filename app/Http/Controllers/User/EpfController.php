<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserEpfDetail;
use App\Models\UserEpfSignatory;
use App\Models\Documents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\Helper as Helper;
 
class EpfController  extends Controller {
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
        $data['epf_company_images'] = Documents::where(['for_multiple' => 'EPF Company'])->get();
        $data['epf_company_signatory_images'] = Documents::where(['for_multiple' => 'EPF Signatory'])->get();
        $data['epf_other_images'] = Documents::where(['for_multiple' => 'EPF Others'])->get();
        return view('user.pages.epf.epfform')->with($data);
    }

    public function storeEpfCompany(Request $request) {
   
        $userId = auth()->user()->id;
        $dataon ='epfsignatory'; 
            $useName = trim(auth()->user()->name).'-'.$userId; 
            $folderName = 'uploads/users/'.$useName.'/Epf/Company';
            $data = Helper :: uploadImagesNew($request, $userId,  $folderName,  'EPF Company');
            $data['user_id'] = $userId;
            $data['epf_type'] = $request['epf_type'];
            $matchthese = ['user_id'=>$userId, 'epf_type'=>'Company'];
            UserEpfDetail::where($matchthese)->delete();
            $lastInsertedId =  UserEpfDetail::updateOrCreate($matchthese, $data)->id;
        if ($request->has('epfsignatory')) {
            $epfsignatory = $request->input('epfsignatory');
            UserEpfSignatory::where(['user_id' => $userId])->delete();
            foreach ($epfsignatory as $key => $ps) {
                $folderName = 'uploads/users/'.$useName.'/Epf/Company/Signatory';
                $partner =  Helper :: uploadSignatoryImages($request, $key, $userId, $folderName, $dataon,'EPF Signatory');
                $partner['user_epf_id'] =  $lastInsertedId;
                $partner['user_id'] =  $userId;
                $partner['epf_sign_email'] = $ps['email'];
                $partner['epf_sign_mobile'] = $ps['mobile'];
                UserEpfSignatory::Create($partner);
            }
        }
        return redirect('/epf/register')->with('success', 'Registered EPF successfully!');
    }


    public function storeEpfOthers(Request $request){
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Epf/Others';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName, $for_multiple='EPF Others');
        $data['user_id'] = $userId;
        $data['epf_email'] = $request['email_id'];
        $data['epf_mobile'] = $request['mobile_number'];
        $data['epf_type'] = $request['epf_type'];
        $matchthese = ['user_id' => $userId, 'epf_type' => 'Others'];
        UserEpfDetail::where($matchthese)->delete();
        UserEpfDetail::updateOrCreate($matchthese, $data);
        return redirect('/epf/register')->with('success', 'Registered EPF Others successfully!');;
    }

    
}