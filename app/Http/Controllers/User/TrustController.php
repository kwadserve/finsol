<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserTrustDetail;
use App\Models\UserTrustMember;
use App\Models\Documents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\Helper as Helper;
 
class TrustController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    

    public function register_form() {
        $data['trust_images'] = Documents::where(['for_multiple' => 'TRUST'])->get();
        $data['trust_member_images'] = Documents::where(['for_multiple' => 'TRUST Member'])->get();
        return view('user.pages.trust.trustform')->with($data);
    }

    public function storeTrust(Request $request) {
   
        $userId = auth()->user()->id;
        $dataon ='trustmember'; 
            $useName = trim(auth()->user()->name).'-'.$userId; 
            $folderName = 'uploads/users/'.$useName.'/Trust';
            $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'TRUST');
            $data['user_id'] = $userId;
            $data['name_of_trust'] = $request->input('name_of_trust');
            $data['nature_of_trust'] = $request->input('nature_of_trust');
            $data['trust_email'] = $request->input('trust_email');
            $data['trust_mobile'] = $request->input('trust_mobile');
            $lastInsertedId =  UserTrustDetail::Create($data)->id;
        if ($request->has('trustmember')) {
            $trustmember = $request->input('trustmember');
            UserTrustMember::where(['user_id' => $userId])->delete();
            foreach ($trustmember as $key => $ps) {
                $folderName = 'uploads/users/'.$useName.'/Trust/Member';
                $member =   Helper :: uploadAddMultipleImages($request, $key, $userId, $folderName,$dataon,'TRUST Member');
                $member['user_trust_id'] =  $lastInsertedId;
                $member['user_id'] =  $userId;
                $member['name_of_member'] = $ps['name_of_member'];
                UserTrustMember::Create($member);
            }
        }
        return redirect('/trust/register')->with('success', 'Registered Trust successfully!');
    }
    
}