<?php
namespace App\Http\Controllers\User\CompaniesAct; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompaniesAct\UserAocDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class AocController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
   
    public function register_form() {
     
        $data['aocimages'] = Documents::where('for_multiple', 'AOC')->get();
        return view('user.pages.companiesact.aocform')->with($data);
    }
  
    public function storeAoc(Request $request) 
    {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/CompaniesAct/Aoc';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'AOC');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_company'] = $request['name_of_company'];
        $data['mobile_number'] = $request['mobile_number'];
        UserAocDetail::Create($data);
        return redirect('/aoc/register')->with('success', 'Registered Aoc successfully!');
    }

 
}