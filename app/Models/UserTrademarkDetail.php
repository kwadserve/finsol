<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserTrademarkDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_trademark_details';
 
    protected $fillable = [
        'user_id',
        'trademark_email',
        'trademark_mobile',
        'trademark_type',
        'trademark_pan_img',
        'trademark_firm_img',
        'trademark_rent_elec_img',
        'trademark_declaration_img',
        'trademark_kyc_img',
        'trademark_certificate_img',
        'trademark_oth_aadhar_img',
        'trademark_udamy_img',
        'trademark_logo_img',
        'trademark_aff_img',
        'trademark_oth_photo_img',
        'trademark_oth_spaceman_img'
    ];

}