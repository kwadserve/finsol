<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserIsoDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_iso_details';

    protected $fillable = [
        'user_id',
        'email_id',
        'name_of_iso',
        'iso_number',
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