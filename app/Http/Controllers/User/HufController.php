<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserHufDetail;
use App\Models\UserHufMember;
use App\Models\Documents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\Helper as Helper;
 
class HufController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    

    public function register_form() {
        $data['huf_member_images'] = Documents::where(['for_multiple' => 'HUF Member'])->get();
        return view('user.pages.huf.hufform')->with($data);
    }

    public function storeHuf(Request $request) {
   
        $userId = auth()->user()->id;
        $dataon ='hufmember'; 
            $useName = trim(auth()->user()->name).'-'.$userId; 
            $folderName = 'uploads/users/'.$useName.'/Huf';
            $data['user_id'] = $userId;
            $data['name_of_huf'] = $request->input('name_of_huf');
            $data['name_of_karta'] = $request->input('name_of_karta');
            $data['huf_email'] = $request->input('huf_email');
            $data['huf_mobile'] = $request->input('huf_mobile');
            $lastInsertedId =  UserHufDetail::Create($data)->id;
        if ($request->has('hufmember')) {
            $hufmember = $request->input('hufmember');
            UserHufMember::where(['user_id' => $userId])->delete();
            foreach ($hufmember as $key => $ps) {
                $folderName = 'uploads/users/'.$useName.'/Huf/Member';
                $partner =   Helper :: uploadAddMultipleImages($request, $key, $userId, $folderName,$dataon,'HUF Member');
                $partner['user_huf_id'] =  $lastInsertedId;
                $partner['user_id'] =  $userId;
                $partner['name_of_member'] = $ps['name_of_member'];
                UserHufMember::Create($partner);
            }
        }
        return redirect('/huf/register')->with('success', 'Registered Huf successfully!');
    }
    
}