<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserShopDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_shop_details';

    protected $fillable = [
        'user_id',
        'email_id',
        'name_of_shop',
        'shop_number',
        'mobile_number',
        'address_img',
        'id_proof_img',
        'pan_img',
        'emps_img',
        'challan_img',
        'add_img',
        'status',
        'last_updated_by',
        'last_update_by_id',
        'additional_img',
        'approved_img',
        'raised_img',
        'admin_note',
        'user_note',
        'type'
    ];

}