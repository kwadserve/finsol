<?php
namespace App\Http\Controllers\User\Certification; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Certification\UserTurnoverDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class TurnoverController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
   
    public function register_form() {
     
        $data['turnoverimages'] = Documents::where('for_multiple', 'TURNOVER')->get();
        return view('user.pages.certification.turnoverform')->with($data);
    }
  
    public function storeTurnover(Request $request) 
    {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Certification/Turnover';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'TURNOVER');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name'] = $request['name'];
        $data['mobile_number'] = $request['mobile_number'];
        UserTurnoverDetail::Create($data);
        return redirect('/turnover/register')->with('success', 'Registered Turnover successfully!');
    }

 
}