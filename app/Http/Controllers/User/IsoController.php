<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserIsoDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class IsoController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
      //  return view('user.pages.gst.details');
    }
    public function register_form() {
     
        $data['isoimages'] = Documents::where('for_multiple', 'ISO')->get();
        return view('user.pages.iso.isoform')->with($data);
    }
  
    public function storeIso(Request $request) {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Iso';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'ISO');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_iso'] = $request['iso_name'];
        $data['mobile_number'] = $request['mobile_number'];
        $matchthese = ['user_id' => $userId];
        // UserIsoDetail::where($matchthese)->delete();
        UserIsoDetail::Create($data);
        return redirect('/iso/register')->with('success', 'Registered Iso successfully!');
    }
     
}