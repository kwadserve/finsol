<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserTaxauditDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class TaxauditController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
      //  return view('user.pages.gst.details');
    }
    public function register_form() {
     
        $data['taxauditimages'] = Documents::where('for_multiple', 'TAXAUDIT')->get();
        return view('user.pages.taxaudit.taxauditform')->with($data);
    }
  
    public function storeTaxaudit(Request $request) {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Taxaudit';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'TAXAUDIT');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_taxaudit'] = $request['taxaudit_name'];
        $data['mobile_number'] = $request['mobile_number'];
        $data['gst_id'] = $request['gst_id'];
        $data['gst_password'] = $request['gst_password'];
        $matchthese = ['user_id' => $userId];
        // UserTaxauditDetail::where($matchthese)->delete();
        UserTaxauditDetail::Create($data);
        return redirect('/taxaudit/register')->with('success', 'Registered Taxaudit successfully!');
    }
     
}