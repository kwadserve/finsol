<?php
namespace App\Http\Controllers\User\CompaniesAct; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompaniesAct\UserMinutesDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class MinutesController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
   
    public function register_form() {
     
        $data['minutesimages'] = Documents::where('for_multiple', 'MINUTES')->get();
        return view('user.pages.companiesact.minutes.minutesform')->with($data);
    }
  
    public function storeMinutes(Request $request) 
    {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/CompaniesAct/Minutes';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'MINUTES');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_company'] = $request['name_of_company'];
        $data['mobile_number'] = $request['mobile_number'];
        UserMinutesDetail::Create($data);
        return redirect('/minutes/register')->with('success', 'Registered Minutes successfully!');
    }

 
}