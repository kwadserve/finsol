<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserItrDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class ItrController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
      //  return view('user.pages.gst.details');
    }
    public function register_form() {
     
        $data['itrimages'] = Documents::where('for_multiple', 'ITR')->get();
        return view('user.pages.itr.itrform')->with($data);
    }
  
    public function storeItr(Request $request) {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Itr';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'ITR');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_itr'] = $request['itr_name'];
        $data['mobile_number'] = $request['mobile_number'];
        $data['pan_number'] = $request['pan_number'];
        $matchthese = ['user_id' => $userId];
        // UserItrDetail::where($matchthese)->delete();
        UserItrDetail::Create($data);
        return redirect('/itr/register')->with('success', 'Registered Itr successfully!');
    }
     
}