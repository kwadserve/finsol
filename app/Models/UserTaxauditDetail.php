<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserTaxauditDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_taxaudit_details';

    protected $fillable = [
        'user_id',
        'email_id',
        'name_of_taxaudit',
        'taxaudit_number',
        'mobile_number',
        'gst_id',
        'gst_password',
        'pancard_img',
        'fee_img',
        'bank_img',
        'aadhar_img',
        'other_img',
        'expense_img',
        'asset_img',
        'acc_img',
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