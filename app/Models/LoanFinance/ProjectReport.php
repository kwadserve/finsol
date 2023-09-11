<?php

namespace App\Models\LoanFinance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ProjectReport extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_loan_report';

    protected $fillable = [
        'user_id',
        'email_id',
        'name_of_company',
        'company_number',
        'mobile_number',
        'networth',
        'project_address',
        'docs_img',
        'bills_img',
        'kyc_img',
        'land_img',
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
