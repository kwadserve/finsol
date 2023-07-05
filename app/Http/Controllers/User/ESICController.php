<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserEsicDetail;
use App\Models\UserEsicSignatory;
use App\Models\Documents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\Helper as Helper;
 
class ESICController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        echo "Detail page";
    }

    public function register_form() {
        $data['esic_company_images'] = Documents::where(['for_multiple' => 'ESIC Company'])->get();
        $data['esic_company_signatory_images'] = Documents::where(['for_multiple' => 'ESIC Signatory'])->get();
        $data['esic_other_images'] = Documents::where(['for_multiple' => 'ESIC Others'])->get();
        return view('user.pages.esic.esicform')->with($data);
    }

    public function storeEsicCompany(Request $request) {
   
        $userId = auth()->user()->id;
        $dataon ='esicsignatory'; 
            $useName = trim(auth()->user()->name).'-'.$userId; 
            $folderName = 'uploads/users/'.$useName.'/Esic/Company';
            $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'ESIC Company');
            $data['user_id'] = $userId;
            $data['esic_type'] = $request['esic_type'];
            $data['name_of_esic'] = $request['name_of_esic'];
            $data['esic_email']= $request['email_id'];
            $data['esic_mobile']= $request['mobile_number'];
            // $matchthese = ['user_id'=>$userId, 'esic_type'=>'Company'];
            // UserEsicDetail::where($matchthese)->delete();
            $lastInsertedId =  UserEsicDetail::Create($data)->id;
        if ($request->has('esicsignatory')) {
            $esicsignatory = $request->input('esicsignatory');
            UserEsicSignatory::where(['user_id' => $userId])->delete();
            foreach ($esicsignatory as $key => $ps) {
                $folderName = 'uploads/users/'.$useName.'/Esic/Company/Signatory';
                $partner =   Helper :: uploadSignatoryImages($request, $key, $userId, $folderName,$dataon,'ESIC Signatory');
                $partner['user_esic_id'] =  $lastInsertedId;
                $partner['user_id'] =  $userId;
                $partner['esic_sign_email'] = $ps['email'];
                $partner['esic_sign_mobile'] = $ps['mobile'];
                UserEsicSignatory::Create($partner);
            }
        }
        return redirect('/esic/register')->with('success', 'Registered ESIC successfully!');
    }


    public function storeEsicOthers(Request $request){
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Esic/Others';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'ESIC Others');
        $data['user_id'] = $userId;
        $data['esic_email'] = $request['email_id'];
        $data['esic_mobile'] = $request['mobile_number'];
        $data['esic_type'] = $request['esic_type'];
        $data['esic_email']= $request['email_id'];
        $data['esic_mobile']= $request['mobile_number'];
        $data['name_of_esic'] = $request['name_of_esic'];
        // $matchthese = ['user_id' => $userId, 'esic_type' => 'Others'];
        // UserEsicDetail::where($matchthese)->delete();
        UserEsicDetail::updateOrCreate($data);
        return redirect('/esic/register')->with('success', 'Registered ESIC Others successfully!');;
    }

    
}