<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserTdsDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class TdsController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
      //  return view('user.pages.gst.details');
    }
    public function register_form() {
     
        $data['tdsimages'] = Documents::where('for_multiple', 'TDS')->get();
        return view('user.pages.tds.tdsform')->with($data);
    }
  
    public function storeTds(Request $request) {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Tds';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'TDS');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_tds'] = $request['tds_name'];
        $data['mobile_number'] = $request['mobile_number'];
        $data['tds_rate'] = $request['tds_rate'];
        $data['tds_amount'] = $request['tds_amount'];
        $data['tds_date'] = $request['tds_date'];
        $data['section'] = $request['section'];
        $matchthese = ['user_id' => $userId];
        // UserTdsDetail::where($matchthese)->delete();
        UserTdsDetail::Create($data);
        return redirect('/tds/register')->with('success', 'Registered Tds/Tcs successfully!');
    }
     
}