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
        $data['epf_company_images'] = Documents::where(['gst_type_val' => '6', 'for_multiple' => null])->get();
        $data['epf_company_signatory_images'] = Documents::where(['gst_type_val' => '6', 'for_multiple' => 'EPF Signatory'])->get();
        $data['epf_other_images'] = Documents::where(['gst_type_val' => '6', 'for_multiple' => 'EPF Others'])->get();
        return view('user.pages.epf.epfform')->with($data);
    }

    public function storeEpfCompany(Request $request) {
   
        $userId = auth()->user()->id;
        $dataon ='epfsignatory'; 
            $useName = trim(auth()->user()->name).'-'.$userId; 
            $folderName = 'uploads/users/'.$useName.'/Epf/Company';
            $data = Helper :: uploadImages($request, $userId, 6, $folderName);
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
                $partner =  $this->uploadSignatoryImages($request, $key, $userId, 6, $folderName,$dataon,'EPF Signatory');
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
        $data = Helper :: uploadImages($request, $userId, 6, $folderName, $for_multiple='EPF Others');
        $data['user_id'] = $userId;
        $data['epf_email'] = $request['email_id'];
        $data['epf_mobile'] = $request['mobile_number'];
        $data['epf_type'] = $request['epf_type'];
        $matchthese = ['user_id' => $userId, 'epf_type' => 'Others'];
        UserEpfDetail::where($matchthese)->delete();
        UserEpfDetail::updateOrCreate($matchthese, $data);
        return redirect('/epf/register')->with('success', 'Registered EPF Others successfully!');;
    }

    public function uploadSignatoryImages($request, $key, $userId, $gst_type_val, $folderName,$dataon,$for_partner_director) {

        $userFolder = $folderName;
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0777, true, true);
        }
        $allimages = Documents::where(['gst_type_val' => $gst_type_val, 'for_multiple' => $for_partner_director])->get();
          $data=[];
        foreach ($allimages as $img) {
            if ($request->file($dataon)) {
                $keyname = $img['doc_key_name'];
                $imgName = str_replace(' ', '', $img['doc_name']);
               $images = $request->file($dataon)[$key];
                $related_imgs = [];
                if (isset($images[$keyname])) {
                    foreach ($images[$keyname] as $index => $p) {
                        $newName = $imgName . '_' . ($index + 1) . '_' .($key).'_'. time() . '.' . $p->getClientOriginalExtension();
                        $imagePath = $p->move($folderName, $newName);
                        $related_imgs[] = $newName; 
                    }
                }
                
            }
          $data[$keyname] =  implode(',', $related_imgs);
        } 
        return $data;
    }
}