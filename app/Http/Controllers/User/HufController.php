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
 
class HufController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        echo "Detail page";
    }

    public function register_form() {
           $data['trademark_company_images'] = Documents::where(['for_multiple' => 'TRADEMARK Company'])->get();
        $data['trademark_company_signatory_images'] = Documents::where(['for_multiple' => 'TRADEMARK Signatory'])->get();
        $data['trademark_other_images'] = Documents::where(['for_multiple' => 'TRADEMARK Others'])->get();
        $data['company_images'] = Documents::where(['for_multiple' => 'COMPANY'])->get();
        $data['company_signatory_images'] = Documents::where(['for_multiple' => 'COMPANY Signatory'])->get();
        return view('user.pages.huf.hufform')->with($data);
    }

    public function storeCompany(Request $request) {
   
        $userId = auth()->user()->id;
        $dataon ='companysignatory'; 
            $useName = trim(auth()->user()->name).'-'.$userId; 
            $folderName = 'uploads/users/'.$useName.'/Company';
            $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'COMPANY');
            $data['user_id'] = $userId;
            $matchthese = ['user_id'=>$userId];
            UserCompanyDetail::where($matchthese)->delete();
            $lastInsertedId =  UserCompanyDetail::updateOrCreate($matchthese, $data)->id;
        if ($request->has('companysignatory')) {
            $companysignatory = $request->input('companysignatory');
            UserCompanySignatory::where(['user_id' => $userId])->delete();
            foreach ($companysignatory as $key => $ps) {
                $folderName = 'uploads/users/'.$useName.'/Company/Signatory';
                $partner =   Helper :: uploadSignatoryImages($request, $key, $userId, $folderName,$dataon,'COMPANY Signatory');
                $partner['user_company_id'] =  $lastInsertedId;
                $partner['user_id'] =  $userId;
                $partner['company_sign_email'] = $ps['email'];
                $partner['company_sign_mobile'] = $ps['mobile'];
                UserCompanySignatory::Create($partner);
            }
        }
        return redirect('/huf/register')->with('success', 'Registered Huf successfully!');
    }
    
}