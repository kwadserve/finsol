<?php
namespace App\Http\Controllers\User\Certification; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Certification\UserCaDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class CaController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
   
    public function register_form() {
     
        $data['caimages'] = Documents::where('for_multiple', 'CA')->get();
        return view('user.pages.certification.caform')->with($data);
    }
  
    public function storeCa(Request $request) 
    {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Certification/Ca';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'CA');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name'] = $request['name'];
        $data['mobile_number'] = $request['mobile_number'];
        UserCaDetail::Create($data);
        return redirect('/ca/register')->with('success', 'Registered Ca successfully!');
    }

 
}