<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserUdamyDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class UdamyController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        echo "asdads"; 
      //  return view('user.pages.gst.details');
    }
    public function register_form() {
        $data['udamy_images'] = Documents::where('for_multiple', 'UDAMY')->get();
        return view('user.pages.udamy.udamyform')->with($data);
    }
  
    public function storeUdamy(Request $request) {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Udamy';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'UDAMY');
        $data['user_id'] = $userId;
        $data['name_of_udamy'] = $request['name_of_udamy'];
        $data['udamy_email'] = $request['udamy_email'];
        $data['udamy_mobile'] = $request['udamy_mobile'];
        UserUdamyDetail::Create($data);
        return redirect('/udamy/register')->with('success', 'Registered Udamy successfully!');
    }
     
}