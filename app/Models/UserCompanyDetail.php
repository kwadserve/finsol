<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserCompanyDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_company_details';

    protected $fillable = [
        'user_id',
        'name_of_company',
        'comp_rent_elec_img',
        'comp_kyc_img',
        'comp_certificate_img',
        'status'
    ];

}