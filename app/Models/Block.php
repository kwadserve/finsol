<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    
    protected $table = 'blocks';

    protected $fillable = [
        'id',
        'name',
        'code'
    ];

     
}