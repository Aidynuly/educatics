<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourseIntro extends Model
{
    use HasFactory;

    const STATUS_IN_PROCESS = 'in_process';
    const STATUS_FINISHED = 'finished';
    const STATUS_DECLINED = 'declined';

    public $timestamps = false;

    protected $fillable = [
        'course_intro_id',
        'user_id',
    ];
}
