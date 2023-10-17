<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PaymentValue extends Authenticatable
{
    use Notifiable;

    protected $table = 'payment_values';

    protected $fillable = [
        'form_type',
        'form',
        'value',
    ];
}
