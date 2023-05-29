<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class GstFormType extends Authenticatable
{
    use Notifiable;

    protected $table = 'gst_form_type';

    protected $fillable = [
        'type'
    ];

}