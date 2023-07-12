<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserUdamyDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_udamy_details';

    protected $fillable = [
        'user_id',
        'name_of_udamy',
        'udamy_number',
        'udamy_email',
        'udamy_mobile',
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