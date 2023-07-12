<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserUdamyDetail;
use App\Models\UserImportExportDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class ImportExportController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        echo "asdads"; 
      //  return view('user.pages.gst.details');
    }
    public function register_form() {
        $data['import_export_images'] = Documents::where('for_multiple', 'IE')->get();
        return view('user.pages.importexport.importexportform')->with($data);
    }
  
    public function storeImportExport(Request $request) {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/ImportExport';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName,'IE');
        $data['user_id'] = $userId;
        $data['name_of_firm'] = $request['name_of_udamy'];
        $data['firm_email'] = $request['firm_email'];
        $data['firm_mobile'] = $request['firm_mobile'];
        UserImportExportDetail::Create($data);
        return redirect('/importexport/register')->with('success', 'Registered ImportExport successfully!');
    }
     
}