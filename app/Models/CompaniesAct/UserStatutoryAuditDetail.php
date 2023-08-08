<?php

namespace App\Models\CompaniesAct;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserStatutoryAuditDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_statutoryaudit_details';

    protected $fillable = [
        'user_id',
        'email_id',
        'name_of_company',
        'company_number',
        'mobile_number',
        'pan_img',
        'aadhar_img',
        'bank_img',
        'deduct_img',
        'expense_img',
        'asset_img',
        'other_img',
        'book_img',
        'any_img',
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