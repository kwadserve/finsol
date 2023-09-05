<?php
namespace App\Http\Controllers\User\Certification; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Certification\UserNetworthDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class NetworthController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
   
    public function register_form() {
     
        $data['networthimages'] = Documents::where('for_multiple', 'NETWORTH')->get();
        return view('user.pages.certification.networthform')->with($data);
    }
  
    public function storeNetworth(Request $request) 
    {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Certification/Networth';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'NETWORTH');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name'] = $request['name'];
        $data['mobile_number'] = $request['mobile_number'];
        UserNetworthDetail::Create($data);
        return redirect('/networth/register')->with('success', 'Registered Networth successfully!');
    }

 
}