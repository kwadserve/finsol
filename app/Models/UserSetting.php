<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserSetting extends Authenticatable
{
    use Notifiable;

    protected $table = 'user_settings';
 
    protected $fillable = [
        'user_id',
        'type',
        'value'
    ];

}