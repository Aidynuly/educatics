<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CourseIntro
 *
 * @property int $id
 * @property int $title
 * @property int $course_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CourseIntroFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseIntro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseIntro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseIntro query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseIntro whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseIntro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseIntro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseIntro whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseIntro whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CourseIntro extends Model
{
    use HasFactory;
}
