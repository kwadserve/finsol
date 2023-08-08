<?php
namespace App\Http\Controllers\User\CompaniesAct; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompaniesAct\UserAdtDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class AdtController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
   
    public function register_form() {
     
        $data['adtimages'] = Documents::where('for_multiple', 'ADT')->get();
        return view('user.pages.companiesact.adtform')->with($data);
    }
  
    public function storeAdt(Request $request) 
    {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/CompaniesAct/Adt';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'ADT');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_company'] = $request['name_of_company'];
        $data['mobile_number'] = $request['mobile_number'];
        UserAdtDetail::Create($data);
        return redirect('/adt/register')->with('success', 'Registered Adt successfully!');
    }

 
}