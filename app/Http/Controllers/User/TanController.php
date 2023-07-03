<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserTanDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class TanController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
      //  return view('user.pages.gst.details');
    }
    public function register_form() {
     
        $data['tanimages'] = Documents::where('for_multiple', 'TAN')->get();
        return view('user.pages.tan.tanform')->with($data);
    }
  
    public function storeTan(Request $request) {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Tan';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'TAN');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_tan'] = $request['tan_name'];
        $data['mobile_number'] = $request['mobile_number'];
        $matchthese = ['user_id' => $userId];
        // UserTanDetail::where($matchthese)->delete();
        UserTanDetail::Create($data);
        return redirect('/tan/register')->with('success', 'Registered Tan successfully!');
    }
     
}