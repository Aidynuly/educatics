<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffText extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'tariff_id',
        'text',
    ];
}
