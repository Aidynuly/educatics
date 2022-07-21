<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourseIntro extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'course_intro_id',
        'user_id',
    ];
}
