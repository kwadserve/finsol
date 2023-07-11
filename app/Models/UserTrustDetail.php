<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserTrustDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_trust_details';

    protected $fillable = [
        'user_id',
        'name_of_trust',
        'trust_number',
        'trust_email',
        'trust_mobile',
        'name_of_trust',
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