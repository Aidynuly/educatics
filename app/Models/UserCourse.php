<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserCourse
 *
 * @property int $id
 * @property int $user_id
 * @property int $course_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\UserCourseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourse query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourse whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourse whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCourse whereUserId($value)
 * @mixin \Eloquent
 */
class UserCourse extends Model
{
    use HasFactory;

    const STATUS_IN_PROCESS = 'in_process';
    const STATUS_FINISHED = 'finished';
    const STATUS_DECLINED = 'declined';

    protected $fillable = [
        'user_id',
        'course_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
