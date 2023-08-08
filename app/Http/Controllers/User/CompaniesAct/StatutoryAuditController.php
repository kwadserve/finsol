<?php
namespace App\Http\Controllers\User\CompaniesAct; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompaniesAct\UserStatutoryAuditDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class StatutoryAuditController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
   
    public function register_form() {
     
        $data['statutoryauditimages'] = Documents::where('for_multiple', 'SA')->get();
        return view('user.pages.companiesact.statutoryauditform')->with($data);
    }
  
    public function storeAudit(Request $request) 
    {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/CompaniesAct/StatutoryAudit';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'SA');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_company'] = $request['name_of_company'];
        $data['mobile_number'] = $request['mobile_number'];
        UserStatutoryAuditDetail::Create($data);
        return redirect('/statutoryaudit/register')->with('success', 'Registered Statutory Audit successfully!');
    }
}