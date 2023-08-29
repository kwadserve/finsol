<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserPanDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_pan_details';

    protected $fillable = [
        'user_id',
        'email_id',
        'name_of_pan',
        'pan_number',
        'mobile_number',
        'payment_unique_id',
        'pan_aadhar_voterid_passport_img',
        'pan_driving_license',
        'pan_your_photo',
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