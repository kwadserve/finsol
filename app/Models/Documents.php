<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Documents extends Authenticatable
{
    use Notifiable;

    protected $table = 'documents';

    protected $fillable = [
        'doc_key_name',
        'doc_name',
        'gst_type_val'
    ];

}