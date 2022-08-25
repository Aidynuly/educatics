<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CourseDoc
 *
 * @property int $id
 * @property int $course_intro_id
 * @property string $path
 * @property string|null $title
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDoc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDoc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDoc query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDoc whereCourseIntroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDoc whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDoc whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDoc wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDoc whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDoc whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CourseDoc extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'course_intro_id',
        'path',
        'title',
        'created_at',
    ];
}
