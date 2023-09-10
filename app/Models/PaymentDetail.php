<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PaymentDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'instamojo_payment_report';

}