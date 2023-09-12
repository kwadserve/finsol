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
        'company_number',
        'company_email',
        'payment_unique_id',
        'company_mobile',
        'comp_rent_elec_img',
        'comp_kyc_img',
        'comp_certificate_img',
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