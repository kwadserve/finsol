<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserTrademarkDetail;
use App\Models\UserTrademarkSignatory;
use App\Models\Documents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\Helper as Helper;
 
class TradeMarkController  extends Controller {
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
        return view('user.pages.trademark.trademarkform')->with($data);
    }

    public function storeTrademarkCompany(Request $request) {
   
        $userId = auth()->user()->id;
        $dataon ='trademarksignatory'; 
            $useName = trim(auth()->user()->name).'-'.$userId; 
            $folderName = 'uploads/users/'.$useName.'/Trademark/Company';
            $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'TRADEMARK Company');
            $data['user_id'] = $userId;
            $data['trademark_type'] = $request['trademark_type'];
            $matchthese = ['user_id'=>$userId, 'trademark_type'=>'Company'];
            UserTrademarkDetail::where($matchthese)->delete();
            $lastInsertedId =  UserTrademarkDetail::updateOrCreate($matchthese, $data)->id;
        if ($request->has('trademarksignatory')) {
            $trademarksignatory = $request->input('trademarksignatory');
            UserTrademarkSignatory::where(['user_id' => $userId])->delete();
            foreach ($trademarksignatory as $key => $ps) {
                $folderName = 'uploads/users/'.$useName.'/Trademark/Company/Signatory';
                $partner =   Helper :: uploadSignatoryImages($request, $key, $userId, $folderName,$dataon,'TRADEMARK Signatory');
                $partner['user_trademark_id'] =  $lastInsertedId;
                $partner['user_id'] =  $userId;
                $partner['trademark_sign_email'] = $ps['email'];
                $partner['trademark_sign_mobile'] = $ps['mobile'];
                UserTrademarkSignatory::Create($partner);
            }
        }
        return redirect('/trademark/register')->with('success', 'Registered TRADEMARK successfully!');
    }


    public function storeTrademarkOthers(Request $request){
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Trademark/Others';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'TRADEMARK Others');
        $data['user_id'] = $userId;
        $data['trademark_email'] = $request['email_id'];
        $data['trademark_mobile'] = $request['mobile_number'];
        $data['trademark_type'] = $request['trademark_type'];
        $matchthese = ['user_id' => $userId, 'trademark_type' => 'Others'];
        UserTrademarkDetail::where($matchthese)->delete();
        UserTrademarkDetail::updateOrCreate($matchthese, $data);
        return redirect('/trademark/register')->with('success', 'Registered TRADEMARK Others successfully!');;
    }

    
}