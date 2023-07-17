<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserShopDetail;
use App\Models\Documents;
use App\Helpers\Helper as Helper;
 
class ShopController  extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
      //  return view('user.pages.gst.details');
    }
    public function register_form() {
     
        $data['shopimages'] = Documents::where('for_multiple', 'SHOP')->get();
        return view('user.pages.shop.shopform')->with($data);
    }
  
    public function storeShop(Request $request) {
        $userId = auth()->user()->id;
        $useName = trim(auth()->user()->name).'-'.$userId; 
        $folderName = 'uploads/users/'.$useName.'/Shop';
        $data = Helper :: uploadImagesNew($request, $userId, $folderName, 'SHOP');
        $data['user_id'] = $userId;
        $data['email_id'] = $request['email_id'];
        $data['name_of_shop'] = $request['shop_name'];
        $data['mobile_number'] = $request['mobile_number'];
        $matchthese = ['user_id' => $userId];
        // UserShopDetail::where($matchthese)->delete();
        UserShopDetail::Create($data);
        return redirect('/shop/register')->with('success', 'Registered Shop successfully!');
    }
     
}