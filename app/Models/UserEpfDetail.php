<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserEpfDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_epf_details';
 
    protected $fillable = [
        'user_id',
        'epf_email',
        'epf_mobile',
        'epf_type',
        'epf_pan_img',
        'epf_firm_img',
        'epf_rent_elec_img',
        'epf_declaration_img',
        'epf_kyc_img',
        'epf_certificate_img',
        'epf_oth_aadhar_img',
        'epf_oth_pan_img',
        'epf_oth_photo_img',
        'epf_oth_spaceman_img'
    ];

}