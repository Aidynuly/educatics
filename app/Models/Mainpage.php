<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mainpage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'video_url',
        'created_at',
        'updated_at',
    ];
}
