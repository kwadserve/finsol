<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Razorpay extends Model
{
     public static function storeOrderData($data,$type){
     
        $userId = auth()->user()->id;
        DB::table('razorpay_order_report')->insert(
            [
                'order_id' =>$data['notes']['order_id'],
                'user_id' => $userId,
                'type' => $type,
                'razorpay_order_id' => $data["id"],
                'amount' => $data["amount"],
                'created_at' => now()
            ]
        );
     }
}
