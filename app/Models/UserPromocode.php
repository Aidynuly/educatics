<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPromocode extends Model
{
    use HasFactory;

    const STATUS_IN_PROCESS = 'in_process';
    const STATUS_SUCCESS = 'success';
    const STATUS_REJECT= 'reject';

    protected $fillable = [
        'user_id',
        'promocode_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
