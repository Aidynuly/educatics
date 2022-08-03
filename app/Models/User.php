<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $type
 * @property int $tariff_id
 * @property int $age
 * @property string $login
 * @property string $password
 * @property string $phone
 * @property string $name
 * @property string $surname
 * @property int $school_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTariffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $count
 * @property string $school_name
 * @property string|null $session_id
 * @property string|null $deadline
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSchoolName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSessionId($value)
 */
class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'type',
        'tariff_id',
        'age',
        'login',
        'password',
        'phone',
        'name',
        'surname',
        'school_name',
        'created_at',
        'updated_at',
        'session_id',
        'deadline',
        'count',
        'city_id',
        'image',
    ];

    static $rules = [
        'type' => 'required',
        'tariff_id' => 'required',
        'age' => 'required',
        'login' => 'required',
        'phone' => 'required',
        'name' => 'required',
        'surname' => 'required',
    ];

    protected $perPage = 20;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tariff()
    {
        return $this->hasOne('App\Tariff', 'id', 'tariff_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userCourses()
    {
        return $this->hasMany('App\UserCourse', 'user_id', 'id');
    }

}
