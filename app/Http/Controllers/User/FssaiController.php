<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserFssaiDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class FssaiController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
      //  return view('user.pages.gst.details');
    }
    public function register_form() {
     
        $data['fssaiimages'] = Documents::where('for_multiple', 'FSSAI')->get();
        return view('user.pages.fssai.fssaiform')->with($data);
    }
  
    public function storeFssai(Request $request) {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Fssai';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'FSSAI');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_fssai'] = $request['fssai_name'];
        $data['mobile_number'] = $request['mobile_number'];
        $matchthese = ['user_id' => $userId];
        // UserFssaiDetail::where($matchthese)->delete();
        UserFssaiDetail::Create($data);
        return redirect('/fssai/register')->with('success', 'Registered Fssai successfully!');
    }
     
}