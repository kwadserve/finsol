<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserEsicDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_esic_details';
 
    protected $fillable = [
        'user_id',
        'esic_email',
        'esic_mobile',
        'esic_type',
        'esic_pan_img',
        'esic_firm_img',
        'esic_rent_elec_img',
        'esic_declaration_img',
        'esic_kyc_img',
        'esic_certificate_img',
        'esic_oth_aadhar_img',
        'esic_oth_pan_img',
        'esic_oth_photo_img',
        'esic_oth_spaceman_img'
    ];

}