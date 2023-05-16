<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CopyOfReturns extends Authenticatable
{
    use Notifiable;

    protected $table = 'copy_of_returns';

    protected $fillable = [
        'user_id',
        'user_gst_id',
        'year',
        'month',
        'quarter',
        'type',
        'documents'
    ];

}