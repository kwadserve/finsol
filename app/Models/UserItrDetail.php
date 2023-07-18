<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserItrDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_itr_details';

    protected $fillable = [
        'user_id',
        'email_id',
        'name_of_itr',
        'itr_number',
        'mobile_number',
        'other_img',
        'receipt_img',
        'aadhar_img',
        'bank_img',
        'fee_img',
        'pan_number',
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