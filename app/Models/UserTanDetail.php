<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserTanDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_tan_details';

    protected $fillable = [
        'user_id',
        'email_id',
        'mobile_number',
        'tan_aadhar_voterid_passport_img',
        'tan_driving_license',
        'tan_your_photo',
        'tan_pan_img',
        'status'
    ];

}