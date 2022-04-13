<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CourseVideo
 *
 * @property int $id
 * @property int $course_id
 * @property int $video_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CourseVideoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseVideo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseVideo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseVideo query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseVideo whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseVideo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseVideo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseVideo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseVideo whereVideoId($value)
 * @mixin \Eloquent
 */
class CourseVideo extends Model
{
    use HasFactory;
}
