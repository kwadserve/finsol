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
        'mobile_number',
        'pan_aadhar_voterid_passport_img',
        'pan_driving_license',
        'pan_your_photo',
        'status'
    ];

}