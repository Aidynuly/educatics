<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Course
 *
 * @property int $id
 * @property int $title
 * @property int $description
 * @property int $price
 * @property string $certificate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CourseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCertificate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $background_color
 * @property string|null $trailer
 * @property int|null $sphere_id
 * @property string|null $icon
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereBackgroundColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereSphereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTrailer($value)
 */
class Course extends Model
{
    use HasFactory;

    static $rules = [
        'title' => 'required',
        'description' => 'required',
        'price' => 'required',
        'certificate' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'certificate',
        'background_color',
        'icon',
        'created_at',
        'updated_at',
        'sphere_id',
        'trailer',
        'queue',
        'meta_title',
        'meta_description',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseIntros()
    {
        return $this->hasMany('App\CourseIntro', 'course_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseVideos()
    {
        return $this->hasMany('App\CourseVideo', 'course_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function translateDescription()
    {
        return $this->hasOne('App\Translate', 'id', 'description');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function translateTitle()
    {
        return $this->hasOne('App\Translate', 'id', 'title');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userCourses()
    {
        return $this->hasMany('App\UserCourse', 'course_id', 'id');
    }
}
