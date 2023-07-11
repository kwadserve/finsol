<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserTrustMember extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_trust_member';
 
    protected $fillable = [
        'user_id',
        'user_trust_id',
        'name_of_member',
        'trust_of_member_img'
    ];

}