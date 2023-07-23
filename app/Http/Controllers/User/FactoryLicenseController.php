<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserUdamyDetail;
use App\Models\UserFactoryLicenseDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class FactoryLicenseController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        echo "asdads"; 
      //  return view('user.pages.gst.details');
    }
    public function register_form() {
        $data['factory_license_images'] = Documents::where('for_multiple', 'FL')->get();
        return view('user.pages.factorylicense.factorylicenseform')->with($data);
    }
  
    public function storeFactoryLicense(Request $request) {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/FactoryLicense';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'FL');
        $data['user_id'] = $userId;
        $data['name_of_facl'] = $request['name_of_udamy'];
        $data['facl_email'] = $request['facl_email'];
        $data['facl_mobile'] = $request['facl_mobile'];
        UserFactoryLicenseDetail::Create($data);
        return redirect('/factorylicense/register')->with('success', 'Registered Factory License successfully!');
    }
     
}