<?php
namespace App\Http\Controllers\User\CompaniesAct; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompaniesAct\UserMgtDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class MgtController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
   
    public function register_form() {
     
        $data['mgtimages'] = Documents::where('for_multiple', 'MGT')->get();
        return view('user.pages.companiesact.mgtform')->with($data);
    }
  
    public function storeMgt(Request $request) 
    {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/CompaniesAct/Mgt';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'MGT');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_company'] = $request['name_of_company'];
        $data['mobile_number'] = $request['mobile_number'];
        UserMgtDetail::Create($data);
        return redirect('/mgt/register')->with('success', 'Registered Mgt successfully!');
    }

 
}