<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserPanDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class PanController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        echo "asdads"; 
      //  return view('user.pages.gst.details');
    }
    public function register_form() {
     
        $data['panimages'] = Documents::where('gst_type_val', '4')->get();
        return view('user.pages.pan.panform')->with($data);
    }
  
    public function storePan(Request $request) {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Pan';
        $data = Helper :: uploadImages($request, $userId, 4, $folderName);
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['mobile_number'] = $request['mobile_number'];
        $matchthese = ['user_id' => $userId];
        UserPanDetail::where($matchthese)->delete();
        UserPanDetail::updateOrCreate($matchthese, $data);
        return redirect('/pan/register')->with('success', 'Registered Pan successfully!');;
    }
     
}