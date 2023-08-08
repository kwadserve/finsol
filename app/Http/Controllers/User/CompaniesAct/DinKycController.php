<?php
namespace App\Http\Controllers\User\CompaniesAct; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompaniesAct\UserDinkycDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class DinkycController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
   
    public function register_form() {
     
        $data['dinkycimages'] = Documents::where('for_multiple', 'DINKYC')->get();
        return view('user.pages.companiesact.dinkycform')->with($data);
    }
  
    public function storeDinkyc(Request $request) 
    {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/CompaniesAct/Dinkyc';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'DINKYC');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_company'] = $request['name_of_company'];
        $data['mobile_number'] = $request['mobile_number'];
        UserDinkycDetail::Create($data);
        return redirect('/dinkyc/register')->with('success', 'Registered Dinkyc successfully!');
    }

 
}