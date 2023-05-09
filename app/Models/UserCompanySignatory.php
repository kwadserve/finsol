<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserCompanySignatory extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_company_signatory';
 
    protected $fillable = [
        'user_id',
        'user_comp_id',
        'comp_sign_mobile',
        'comp_sign_email',
        'comp_sign_pan_img',
        'comp_sign_aadhar_img',
        'comp_sign_photo_img',
        'comp_sign_spaceman_img',
        'comp_sign_declare_img'.
        'comp_sign_aff_img'
    ];

}