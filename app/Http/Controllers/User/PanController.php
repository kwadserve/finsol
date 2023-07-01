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
   
    public function register_form() {
     
        $data['panimages'] = Documents::where('for_multiple', 'PAN')->get();
        return view('user.pages.pan.panform')->with($data);
    }
  
    public function storePan(Request $request) {
         
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Pan';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'PAN');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_pan'] = $request['pan_name'];
        $data['mobile_number'] = $request['mobile_number'];
        UserPanDetail::Create($data);
        return redirect('/pan/register')->with('success', 'Registered Pan successfully!');
    }

 
}