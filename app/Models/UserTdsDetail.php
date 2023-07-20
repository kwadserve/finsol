<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserTdsDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_tds_details';

    protected $fillable = [
        'user_id',
        'email_id',
        'name_of_tds',
        'tds_number',
        'mobile_number',
        'pan_img',
        'tan_img',
        'tds_img',
        'challan_img',
        'tds_date',
        'tds_rate',
        'tds_amount',
        'section',
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