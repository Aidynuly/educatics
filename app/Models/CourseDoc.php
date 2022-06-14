<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDoc extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'course_intro_id',
        'path',
    ];
}
